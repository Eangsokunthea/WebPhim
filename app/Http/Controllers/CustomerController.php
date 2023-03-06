<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Customer::all();
        return view('BackEnd.customer.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('BackEnd.customer.form', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->phone_no = $data['phone_no'];
        $customer->email  = $data['email'];
        $customer->password = $data['password'];
        $customer->save();
        toastr()->success('Thành công','Thêm khách hàng thành công.');
        return Redirect::to('/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $customer = Customer::find($id);
        return view('BackEnd.customer.form', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $customer = Customer::find($id);
        $customer->name = $data['name'];
        $customer->phone_no = $data['phone_no'];
        $customer->email  = $data['email'];
        $customer->password = $data['password'];
        $customer->save();
        toastr()->success('Thành công','Cập nhật khách hàng thành công.');
        return Redirect::to('/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id){
        Customer::find($id)->delete();
        toastr()->success('Thành công','Xóa Customer thành công.');
        return redirect()->back();
    }  


    public function register(){
        $categories = Category::where('status', 1)->get();
        return view('FrontEnd.pages.customer.register', compact('categories'));
    }
    
    public function store_register(Request $request){
        $customer = new Customer();
        $customer->name = $request->name; 
        $customer->email = $request->email; 
        $customer->phone_no = $request->phone_no; 
        $customer->password = bcrypt($request->password); 
        $customer->save();

        $id = $customer->id;
        Session::put('id', $id);
        Session::put('customer_name', $customer->name);

        return redirect('/');
    }
    public function login(){
        $categories = Category::where('status', 1)->get();
        return view('FrontEnd.pages.customer.login', compact('categories'));
    }
    public function store_login(Request $request){
        // $customer = Customer::where('email', $request->email)->first();
        // if(password_verify($request->password, $customer->password))
        // {
        //     Session::put('id', $customer->id);
        //     Session::put('customer_name', $customer->name);
        //     return redirect('/');
        // }
        // else
        // {
        //     return redirect('/login/customer')->with('error', 'Your password is Incorrect, Please provide us your correct password.');

        // }
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('customers')->where('email',$email)->where('password',$password)->first();

        if($result){
            Session::put('id',$result->id);
        return Redirect::to('/');
        }else{
        return Redirect::to('/login/customer');
        }
        Session::save();
    }
    public function logout(){
        Session::forget('id');
        Session::forget('customer_name');
        return redirect('/');
    }
    
}
