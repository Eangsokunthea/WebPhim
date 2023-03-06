<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Info;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;

class IndexController extends Controller
{
    public function timkiem(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $movie = Movie::withCount('episode')->where('title', 'LIKE', '%'.$search.'%')->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
            return view('FrontEnd.pages.timkiem',compact('search', 'movie'));
        }else{
            return redirect()->to('/');
        }
        
    }
    public function locphim(){
        //get
        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];

        
        if($sapxep=='' && $genre_get=='' && $country_get=='' && $year_get==''){
            return redirect()->back();
        }else{
            
            $movie = Movie::withCount('episode');

            if($genre_get){
                $movie = $movie->where('genre_id', '=', $genre_get);
            }elseif($country_get){
                $movie = $movie->where('country_id','=',$country_get);
            }elseif($year_get){
                $movie = $movie->where('year', '=', $year_get);
            }elseif($sapxep){
                $movie = $movie->orderBy('title', 'ASC');
            }
            $movie = $movie->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
            return view('FrontEnd.pages.locphim',compact('movie'));
            
        }
    }

    public function home(){
        $info = Info::find(1);
        $meta_title = $info->title;
        $meta_description = $info->description;
        $meta_image = '';

        $Category_home = Category::with(['movie' => function($q){$q->withCount('episode')->where('status',1);} ])->orderBy('id','ASC')->where('status', 1)->get();
        return view('FrontEnd.pages.home',compact('Category_home','meta_title', 'meta_description', 'meta_image'));
    }

    public function category($slug){
        $cate_slug = Category::where('slug', $slug)->first();
        $meta_title = $cate_slug->title;
        $meta_description = $cate_slug->description;
        $meta_image = '';
        $movie = Movie::withCount('episode')->where('category_id', $cate_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.category',compact('cate_slug', 'movie','meta_title', 'meta_description', 'meta_image'));
    }

    public function tag($tag){    
        $tag = $tag;
        $meta_title = $tag;
        $meta_description = $tag;
        $meta_image = '';
        $movie = Movie::withCount('episode')->where('tags','LIKE','%'.$tag.'%')->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.tag',compact('tag', 'movie','meta_title', 'meta_description', 'meta_image'));
    }

    public function year($year){    
        $year = $year;
        $meta_title = 'Năm Phim: '.$year;
        $meta_description = 'Tìm phim năm: '.$year;
        $meta_image = '';
        $movie = Movie::withCount('episode')->where('year', $year)->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.year',compact('year', 'movie','meta_title', 'meta_description', 'meta_image'));
    }

    public function country($slug){
        $count_slug = Country::where('slug', $slug)->first();
        $meta_title = $count_slug->title;
        $meta_description = $count_slug->description;
        $meta_image = '';
        $movie = Movie::withCount('episode')->where('country_id', $count_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.country',compact('count_slug', 'movie','meta_title', 'meta_description', 'meta_image'));
    }

    public function genre($slug){
        $genre_slug = Genre::where('slug', $slug)->first();
        $meta_title = $genre_slug->title;
        $meta_description = $genre_slug->description;
        $meta_image = '';
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi){
            $many_genre[] = $movi->movie_id;
        }
        $movie = Movie::withCount('episode')->whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('FrontEnd.pages.genre',compact('genre_slug', 'movie','meta_title', 'meta_description', 'meta_image'));
    }

    public function movie($slug){
        $movie = Movie::with('category','genre','country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $meta_title = $movie->title;
        $meta_description = $movie->description;
        $meta_image = url('uploads/movie/'.$movie->image);
        
        //lay tap 1
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode', 'ASC')->take(1)->first();

        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)
            ->orderBy(DB::raw('RAND()'))
            ->whereNotIn('slug',[$slug])->get();
        
        //lay 3 tap gan nhat
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();

        //lau tong tap phim da them
        $episode_current_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        // rating movie 
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id', $movie->id)->count();

        //increase movie views
        $count_views = $movie->count_views;
        $count_views = $count_views + 1;
        $movie->count_views = $count_views;
        $movie->save();

        return view('FrontEnd.pages.movie',compact('movie', 'related','episode', 'episode_tapdau', 'episode_current_list_count', 'rating', 'count_total','meta_title', 'meta_description', 'meta_image'));
    }

    public function watch($slug,$tap){
        $movie = Movie::with('category','genre','country', 'movie_genre','episode')->where('slug', $slug)->where('status', 1)->first();         
        
        // $meta_title = 'Xem phim: '.$movie->title;
        // $meta_description = $movie->description;
        // $meta_image = url('uploads/movie/'.$movie->image);

        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)
            ->orderBy(DB::raw('RAND()'))
            ->whereNotIn('slug',[$slug])->get();

        //lay tap 1 tap-FullHD
        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap, 4,20);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }
        
        return view('FrontEnd.pages.watch' ,compact('movie', 'episode', 'tapphim', 'related'));
    }
    
    public function episode(){
        return view('FrontEnd.pages.episode');
    }

    public function add_rating(Request $request){
        $data = $request->all();
        $ip_address = $request->ip();

        $rating_count = Rating::where('movie_id', $data[ 'movie_id'])->where('ip_address', $ip_address)->count();
        if($rating_count>0){
            echo 'exist';
        }else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
    }

    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_movie_id = $data['comment_movie_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'Sokunthea-GMovie';
        $comment->save();

    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function list_comment(){
        $comment = Comment::with('movie')->where('comment_parent_comment','=',0)->orderBy('id','DESC')->get();
        $comment_rep = Comment::with('movie')->where('comment_parent_comment','>',0)->get();
        return view('BackEnd.comment.index', compact('comment', 'comment_rep'));
    }
    public function send_comment(Request $request){
        $movie_id = $request->movie_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_movie_id = $movie_id;
        $comment->comment_status = 1;
        $comment->comment_parent_comment = 0;
        $comment->save();
    }
    public function load_comment(Request $request){
        $movie_id = $request->movie_id;
        $comment = Comment::where('comment_movie_id',$movie_id)->where('comment_parent_comment','=',0)->where('comment_status',0)->get();
        $comment_rep = Comment::with('movie')->where('comment_parent_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output.= ' 
                <div class="row style_comment">
                    <div class="col-md-1">
                        <img width="120%" src="'.url('/images/customer.jpg').'" class="img img-responsive img-thumbnail">
                    </div>
                    <div class="col-md-10">
                        <p style="color:#44e014;">@'.$comm->comment_name.' <b style="color:#000;font-size:8px;">('.$comm->comment_date.')</b></p>
                        <p>'.$comm->comment.'</p>
                    </div>

                </div><p></p>
            ';

            foreach($comment_rep as $key => $rep_comment)  {
                if($rep_comment->comment_parent_comment==$comm->id)  {
                $output.= ' <div class="row style_comment" style="margin:5px 40px;background: #6289d2;">

                <div class="col-md-1">
                    <img width="100%" src="'.url('/images/OIP.jpg').'" class="img img-responsive img-thumbnail">
                </div>
                <div class="col-md-10">
                    <p style="color:#fff200;">@Admin <b style="color:#000;font-size:8px;">('.$comm->comment_date.')</b></p>
                    <p style="color:#fff;">'.$rep_comment->comment.'</p>
                    <p></p>
                </div>
                </div><p></p>';
                }
            }
        }
        echo $output;

    }
    public function delete_comment($id){
        Comment::find($id)->delete();
        toastr()->success('Thành công','Xóa bình luận thành công.');
        return redirect()->back();
    }  
    
    public function thongtinCustomer(){
        $customer = Customer::find(Session::get('id'));
        return view('FrontEnd.pages.thongtincanhan', compact('customer'));
    }
    public function lienhe(){
        return view('FrontEnd.pages.lienhe');
    }

    public function quen_mat_khau(Request $request){
        return view('FrontEnd.pages.customer.forget_pass'); 
   }

    public function recover_pass(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu từ Website xem phim free online GMOVE".' '.$now;
        $customer = Customer::where('email','=',$data['email'])->get();
        foreach($customer as $key => $value){
            $customer_id = $value->id;
        }
        
        if($customer){
            $count_customer = $customer->count();
            if($count_customer==0){
                return redirect()->back()->with('error', 'Email chưa được đăng ký để khôi phục mật khẩu');
            }else{
                $token_random = Str::random();
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();
                //send mail
            
                $to_email = $data['email'];//send to this email
                $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);
            
                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email']); //body of mail.blade.php
                
                Mail::send('FrontEnd.pages.customer.forget_pass_notify', ['data'=>$data] , function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from($data['email'],$title_mail);//send from this mail
                });
                //--send mail
                return redirect()->back()->with('message', 'Gửi mail thành công,vui lòng vào email để reset password');
            }
        }
    }

    public function update_new_pass(Request $request){
       return view('FrontEnd.pages.customer.new_pass');
   }

    public function reset_new_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if($count>0){
                foreach($customer as $key => $cus){
                    $customer_id = $cus->id;
                }
                $reset = Customer::find($customer_id);
                $reset->password = md5($data['password']);
                $reset->customer_token = $token_random;
                $reset->save();
                return redirect('/login/customer')->with('message', 'Mật khẩu đã cập nhật mới,vui lòng đăng nhập');
        }else{
            return redirect('quen-mat-khau')->with('error', 'Vui lòng nhập lại email vì link đã quá hạn');
        }
    }
    

}
