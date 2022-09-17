@extends('BackEnd.master')
@section('title')
    Thêm phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  

        <h3 class="text-center">Quản lý phim</h3>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên phim</th>
                    <!-- <th>Tags</th> -->
                    <!-- <th>Thời lượng phim</th> -->
                    <th>Trailer</th>
                    <!-- <th>Tên tiếng anh</th> -->
                    <th>Hình ảnh</th>
                    <!-- <th>Phim Hot</th> -->
                    <th>Định dạng</th>
                    <th>Phụ đề</th>
                    <!-- <th>Mô tả</th> -->
                    <!-- <th>Slug</th> -->
                    <th>Trạng thái</th>
                    <!-- <th>Danh mục</th> -->
                    <th>Thuộc Phim</th>
                    <th>Thẻ loại</th>
                    <!-- <th>Quốc gia</th> -->
                    <th>Số tập</th>
                    <!-- <th>Ngày tạo</th> -->
                    <th>Ngày cập nhật</th>
                    <th>Năm phim</th>
                    <th>Top view</th>
                    <th>Season</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($list as $key => $cate)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$cate->title}}</td>
                    <!-- <td>
                        @if($cate->tags!=NULL)
                            {{substr($cate->tags,0,50)}}...
                        @else
                            Chưa có từ khóa cho phim
                        @endif
                    </td> -->
                    <!-- <td>{{$cate->thoiluong}}</td> -->
                    <td>{{$cate->trailer}}</td>
                    <!-- <td>{{$cate->name_eng}}</td> -->
                    <td><img src="{{asset('uploads/movie/'.$cate->image)}}" width="60%"></td>
                    <!-- <td>
                        @if($cate->phim_hot==0)
                            Không
                        @else
                            Có  
                        @endif    
                    </td> -->
                    <td>
                        @if($cate->resolution==0)
                            HD
                        @elseif($cate->resolution==1)
                            SD 
                        @elseif($cate->resolution==2)
                            HDCam
                        @elseif($cate->resolution==3)
                            Cam
                        @elseif($cate->resolution==4)
                            FullHD
                        @else
                            Trailer    
                        @endif    
                    </td>
                    <td>
                        @if($cate->phude==0)
                            Phụ đề
                        @else
                            Thuyết minh
                        @endif    
                    </td>
                    <!-- <td>{{$cate->description}}</td> -->
                    <!-- <td>{{$cate->slug}}</td> -->
                    <td>
                        @if($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị    
                        @endif    
                    </td>
                    <!-- <td>{{$cate->category->title}}</td> -->
                    <td>
                        @if($cate->thuocphim=='phimle')
                            Phim lẻ
                        @else
                            Phim bộ
                        @endif
                    </td>
                    <td>
                        @foreach($cate->movie_genre as $gen)
                            <span class="badge badge-dark">{{$gen->title}}</span>
                        @endforeach
                    </td>
                    <!-- <td>{{$cate->country->title}}</td> -->
                    <td>{{$cate->sotap}}</td>
                    <!-- <td>{{$cate->ngaytao}}</td> -->
                    <td>{{$cate->ngaycapnhat}}</td>
                    <td>
                        <form method="POST">
                            @csrf 
                             
                            {!! Form::selectYear('year',2000,2022, isset($cate->year) ? $cate->year : '', ['class'=>'select-year', 'id'=>$cate->id]) !!}
                        </form>
                        
                    </td>
                    <td>
                        {!! Form::select('topview', ['0'=>'Ngày', '1'=>'Tuần','2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=>'select-topview', 'id'=>$cate->id]) !!}
                        <!-- <form method="POST">
                            @csrf
                            <select name="top_view" class="topview">
                                @if($cate->top_view==1)
                                    <option value="0" id="{{$cate->id}}">Ngày</option>
                                    <option value="1" selected id="{{$cate->id}}">Tuần</option>
                                    <option value="2" id="{{$cate->id}}">Tháng</option>
                                    <option value="3" id="{{$cate->id}}">Năm</option>
                                @elseif($cate->top_view==2)
                                    <option value="0" id="{{$cate->id}}">Ngày</option>
                                    <option value="1" id="{{$cate->id}}">Tuần</option>
                                    <option value="2" selected id="{{$cate->id}}">Tháng</option>
                                    <option value="3" id="{{$cate->id}}">Năm</option>
                                @elseif($cate->top_view==3)
                                    <option value="0" id="{{$cate->id}}">Ngày</option>
                                    <option value="1" selected id="{{$cate->id}}">Tuần</option>
                                    <option value="2" id="{{$cate->id}}">Tháng</option>
                                    <option value="3" selected id="{{$cate->id}}">Năm</option>
                                @else
                                    <option value="0" selected id="{{$cate->id}}">Ngày</option>
                                    <option value="1" selected id="{{$cate->id}}">Tuần</option>
                                    <option value="2" id="{{$cate->id}}">Tháng</option>
                                    <option value="3" id="{{$cate->id}}">Năm</option>
                                @endif
                            </select>
                        </form> -->
                    </td>

                    <td>
                        <form method="POST">
                            @csrf 
                             
                            {!! Form::selectRange('season',0,20, isset($cate->season) ? $cate->season : '0', ['class'=>'select-season', 'id'=>$cate->id]) !!}
                        </form>
                        <!-- {!! Form::selectRange('season',0,20, isset($cate->season) ? $cate->season : '0', ['class'=>'select-season', 'id'=>$cate->id]) !!} -->

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$cate->id],'onsubmit'=>'return confirm("Xóa hay không?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('movie.edit',$cate->id)}}"class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
