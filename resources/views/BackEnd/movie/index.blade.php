@extends('BackEnd.master')
@section('title')
    Thêm phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>
        <a href="{{route('danh_gia')}}" class="btn btn-warning">đánh gia phim</a>

        <!-- <h3 class="text-center">QUẢN LÝ PHIM</h3> -->
        <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ PHIM</span></h2>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên phim</th>
                    <th>Tập phim</th>
                    <!-- <th>Tags</th> -->
                    <!-- <th>Thời lượng phim</th> -->
                    <!-- <th>Trailer</th> -->
                    <!-- <th>Tên tiếng anh</th> -->
                    <th>Hình ảnh</th>
                    <th>Phim Hot</th>
                    <!-- <th>Định dạng</th> -->
                    <th>Phụ đề</th>
                    <!-- <th>Mô tả</th> -->
                    <!-- <th>Slug</th> -->
                    <!-- <th>Trạng thái</th> -->
                    <!-- <th>Danh mục</th> -->
                    <!-- <th>Thuộc Phim</th> -->
                    <!-- <th>Quốc gia</th> -->
                    <th>Thẻ loại</th>
                    <th>Số tập</th>
                    <!-- <th>Ngày tạo</th> -->
                    <!-- <th>Ngày cập nhật</th> -->
                    <th>Năm phim</th>
                    <th>Top view</th>
                    <!-- <th>Season</th> -->
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($list as $key => $cate)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$cate->title}}</td>
                    <td><a href="{{route('add-episode',[$cate->id])}}" class="btn btn-danger btn-xs">Thêm tập</a></td>
                    
                    <!-- <td>
                        @if($cate->tags!=NULL)
                            {{substr($cate->tags,0,50)}}...
                        @else
                            Chưa có từ khóa cho phim
                        @endif
                    </td> -->
                    <!-- <td>{{$cate->thoiluong}}</td> -->
                    <!-- <td>{{$cate->trailer}}</td> -->
                    <!-- <td>{{$cate->name_eng}}</td> -->
                    <td>
                        <img src="{{asset('uploads/movie/'.$cate->image)}}" width="40">
                        <input type="file" id="file-{{$cate->id}}" data-movie_id="{{$cate->id}}" class="form-control-file file_image" accept="image/*">
                        <span id="success_image"></span>
                    </td>
                    
                    <td>    
                        <select id="{{$cate->id}}" class="form-control phimhot_choose">
                            @if($cate->phim_hot==0)
                                <option value="1">Hot</option>
                                <option selected value="0">Không</option>
                            @else
                                <option selected value="1">Hot</option>
                                <option value="0">Không</option>
                            @endif
                        </select>
                    </td>
                    <!-- <td>
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
                    </td> -->
                    
                    
                    <td>    
                        <select id="{{$cate->id}}" class="form-control phude_choose">
                            @if($cate->phude==0)
                                <option value="1">Thuyết minh</option>
                                <option selected value="0">Phụ đề</option>
                            @else
                                <option selected value="1">Thuyết minh</option>
                                <option value="0">Phụ đề</option>
                            @endif
                        </select>
                    </td>
                    <!-- <td>{{$cate->description}}</td> -->
                    <!-- <td>{{$cate->slug}}</td> -->
                   
                    <!-- <td>    
                        <select id="{{$cate->id}}" class="form-control trangthai_choose">
                            @if($cate->status==0)
                                <option value="1">Hiển thị</option>
                                <option selected value="0">Không</option>
                            @else
                                <option selected value="1">Hiển thị</option>
                                <option value="0">Không</option>
                            @endif
                        </select>
                    </td> -->
                    <!-- <td>
                        {!! Form::select('category_id', $category , isset($cate) ? $cate->category->id : '', ['class'=>'form-control category_choose', 'id'=> $cate->id]) !!}
                    </td> -->
                    <!-- <td>    
                        <select id="{{$cate->id}}" class="form-control thuocphim_choose">
                            @if($cate->thuocphim=='phimbo')
                                <option value="phimle">Phim lẻ</option>
                                <option selected value="phimbo">Phim bộ</option>
                            @else
                                <option selected value="phimle">Phim lẻ</option>
                                <option value="phimbo">Phim bộ</option>
                            @endif
                        </select>
                    </td> -->
                    <!-- <td>
                        {!! Form::select('country_id', $country , isset($cate) ? $cate->country->id : '', ['class'=>'form-control country_choose', 'id'=> $cate->id]) !!}
                    </td> -->
                    <td>
                        @foreach($cate->movie_genre as $gen)
                            <span class="badge badge-dark">{{$gen->title}}</span>
                        @endforeach
                    </td>
                    <td><span class="badge badge-success">{{$cate->episode_count}}/{{$cate->sotap}}tập</span></td>
                    <!-- <td>{{$cate->ngaytao}}</td> -->
                    <!-- <td>{{$cate->ngaycapnhat}}</td> -->
                    <td>
                        <form method="POST">
                            @csrf 
                            {!! Form::selectYear('year',2000,2022, isset($cate->year) ? $cate->year : '', ['class'=>'select-year form-control', 'id'=>$cate->id,'placeholder'=>'--Năm phim--']) !!}
                        </form>
                        
                    </td>
                    <td>
                        {!! Form::select('topview', ['0'=>'Ngày', '1'=>'Tuần','2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=>'select-topview form-control', 'id'=>$cate->id,'placeholder'=>'--View--']) !!}
                    </td>

                    <!-- <td>
                        <form method="POST">
                            @csrf 
                             
                            {!! Form::selectRange('season',0,20, isset($cate->season) ? $cate->season : '0', ['class'=>'select-season', 'id'=>$cate->id]) !!}
                        </form>

                    </td> -->
                    <td>
                        <a href="{{route('movie.edit',$cate->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>
                        <a href="{{route('delete_movie', ['id'=>$cate->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                    </td>
                </tr>
              @endforeach
            </tbody>
             
            
        </table>

    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="text-align: center;">
                                    Quản lý phim
                                </h3>
                                <form action="{{url('update-movie')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="movie_id" id="movie_id" value="">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">Tên phim</label>
                                                <input type="text" class="form-control" name="title" id="title">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">Số tập</label>
                                                <input type="text" class="form-control" name="sotap" id="sotap" placeholder="Nhập vào dữ liệu...">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">Thời lượng phim</label>
                                                <input type="text" class="form-control" name="thoiluong" id="thoiluong" placeholder="Nhập vào dữ liệu...">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Nhập vào dữ liệu...">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">Tên tiếng anh</label>
                                                <input type="text" class="form-control" name="name_eng" id="name_eng" placeholder="Nhập vào dữ liệu...">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="">Trailer</label>
                                                <input type="text" class="form-control" name="trailer" id="trailer" placeholder="Nhập vào dữ liệu...">
                                            </div>
                                        </div>
                
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
                    </button>
                </div>

            </div>
        </div>
    </div> -->

@endsection
