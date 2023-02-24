@extends('BackEnd.master')
@section('title')
    Thông tin Bình Luận
@endsection

@section('content')
  
    <div class="card-body">

        <h3 class="text-center" style="font-weight: 500;">QUẢN LÝ THÔNG TIN BÌNH LUẬN</h3>
        <div id="notify_comment"></div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Duyệt</th>
                    <th>Tên người gửi</th>
                    <th>Bình luận</th>
                    <th>Ngày gửi</th>
                    <th>Phim</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody class="order_position">
                @php($i = 1)
                @foreach($comment as $key => $comm)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                    @if($comm->comment_status==1)
                        <input type="button" data-comment_status="0" data-comment_id="{{$comm->id}}" id="{{$comm->comment_movie_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt" >
                    @else 
                        <input type="button" data-comment_status="1" data-comment_id="{{$comm->id}}" id="{{$comm->comment_movie_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt" >
                    @endif
                    
                    </td>
                    <td>{{ $comm->comment_name }}</td>

                    <td>{{ $comm->comment }}
                            <style type="text/css">
                                ul.list_rep li {
                                list-style-type: decimal;
                                color: blue;
                                margin: 5px 40px;
                            }
                            </style>
                            <ul class="list_rep">
                                Trả lời : 
                                @foreach($comment_rep as $key => $comm_reply)
                                    @if($comm_reply->comment_parent_comment==$comm->id)
                                        <li> {{$comm_reply->comment}}</li>
                                    @endif
                                
                                @endforeach
                            </ul>
                            @if($comm->comment_status==0)
                                <br/><textarea class="form-control reply_comment_{{$comm->id}}" rows="3"></textarea>
                                <br/><button class="btn btn-default btn-xs btn-reply-comment" data-movie_id="{{$comm->comment_movie_id}}"  data-comment_id="{{$comm->id}}">Trả lời bình luận</button>
                            
                            @endif
                            <!-- <button type="button" class="btn btn-primary" data-comment_id="{{$comm->id}}" id="editbtn">show</button> -->
                    </td>
                    <td>{{ \Carbon\Carbon::parse( $comm->comment_date )->format('d/m/Y'); }}</td>
                    <td><a href="{{asset('uploads/movie/'.$comm->movie->image)}}" target="_blank">{{ $comm->movie->title }}</a></td>
                    <td>
                        <a href="" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
            
        </table>

    </div>

@endsection
