@extends('BackEnd.master')
@section('title')
    Liệt kê phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt kê phim</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  

        <h3 class="text-center">Quản lý phim</h3>
        
        <div class="offset-2 col-md-8 my-lg-8">
            @if(!isset($movie))
                {!! Form::open(['route' => 'movie.store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @else
                {!! Form::open(['route' => ['movie.update',$movie->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
            @endif   
                <div class="form-group">
                    {!! Form::label('title','Tên phim', []) !!}
                    {!! Form::text('title',isset($movie) ? $movie->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sotap','Số tập', []) !!}
                    {!! Form::text('sotap',isset($movie) ? $movie->sotap : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('thoiluong','Thời lượng phim', []) !!}
                    {!! Form::text('thoiluong',isset($movie) ? $movie->thoiluong : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Slug', []) !!}
                    {!! Form::text('slug',isset($movie) ? $movie->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tên tiếng anh','Tên tiếng anh', []) !!}
                    {!! Form::text('name_eng',isset($movie) ? $movie->name_eng : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...' ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('trailer','Trailer', []) !!}
                    {!! Form::text('trailer',isset($movie) ? $movie->trailer : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description','Mô tả', []) !!}
                    {!! Form::textarea('description',isset($movie) ? $movie->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tags','Tags Phim', []) !!}
                    {!! Form::textarea('tags',isset($movie) ? $movie->tags : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status','Trạng thái', []) !!}
                    {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($movie) ? $movie->status : '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('resolution','Định dạng', []) !!}
                    {!! Form::select('resolution', ['0'=>'HD', '1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD', '5'=>'Trailer'], isset($movie) ? $movie->resolution : '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phude','Phụ đề', []) !!}
                    {!! Form::select('phude', ['0'=>'Phụ đề', '1'=>'Thuyết minh'], isset($movie) ? $movie->phude : '', ['class'=>'form-control']) !!}
                </div>
                
                <!--  -->
                <div class="form-group">
                    {!! Form::label('category','Danh mục', []) !!}
                    {!! Form::select('category_id', $category , isset($movie) ? $movie->category : '', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('thuocphim','Thuộc thể loại phim', []) !!}
                    {!! Form::select('thuocphim', ['phimle'=>'Phim lẻ', 'phimbo'=>'Phim bộ'] , isset($movie) ? $movie->thuocphim : '', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('country','Quốc gia', []) !!}
                    {!! Form::select('country_id', $country, isset($movie) ? $movie->country : '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('genre','Thể loại', []) !!} <br>
                    <!-- {!! Form::select('genre_id', $genre , isset($movie) ? $movie->genre : '', ['class'=>'form-control']) !!} -->
                    @foreach($list_genre as $key => $gen)
                        @if(isset($movie))
                            {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                        @else     
                            {!! Form::checkbox('genre[]', $gen->id,'') !!}
                        @endif 
                        {!! Form::label('genre', $gen->title) !!}   
                    @endforeach
                </div>
                <div class="form-group">
                    {!! Form::label('hot','Phim Hot', []) !!}
                    {!! Form::select('phim_hot', ['1'=>'Có', '0'=>'Không'], isset($movie) ? $movie->phim_hot : '', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image','Hình ảnh', []) !!}
                    {!! Form::file('image', ['class'=>'form-control-file']) !!}
                    @if(isset($movie))
                        <img src="{{asset('uploads/movie/'.$movie->image)}}" width="20%">
                    @endif
                </div>
            @if(!isset($movie))
                {!! Form::submit('Thêm dữ liệu', ['class'=>' btn btn-success']) !!}
            @else
                {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
            @endif 
     
            {!! Form::close() !!}
        </div>
        

    </div>

@endsection
