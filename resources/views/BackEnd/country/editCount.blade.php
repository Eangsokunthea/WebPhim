@extends('BackEnd.master')
@section('title')
    Thông tin Quốc gia
@endsection

@section('content')

<!-- {{-- Add Modal --}} -->
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudentModalLabel">THÊM QUỐC GIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>
                <div class="form-group mb-3">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($country) ? $country->title : '', ['class'=>'title form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('slug','Slug', []) !!}
                        {!! Form::text('slug',isset($category) ? $category->slug : '', ['class'=>'slug form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
                
                <div class="form-group mb-3">
                    {!! Form::label('active','Active', []) !!}
                    {!! Form::select('status', ['Hiển thị'=>'Hiển thị', 'Không'=>'Không'], isset($country) ? $country->status : '', ['class'=>'status form-control']) !!}
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($country) ? $country->description : '', ['style'=>'resize:none','rows' => 3 ,'class'=>'description form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                  
                </div>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_country">Save</button>
            </div>

        </div>
    </div>
</div>
<!-- {{-- Edit Modal --}} -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa & Cập Nhập Quốc Gia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>
                <input type="hidden" id="count_id" />

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="title" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" id="slug" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" id="status" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" id="description" required class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_count">Update</button>
            </div>
                <!-- <div class="form-group mb-3">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($country) ? $country->title : '', ['class'=>'title form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug' , 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('slug','Slug', []) !!}
                        {!! Form::text('slug',isset($category) ? $category->slug : '', ['class'=>'slug form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
                
                <div class="form-group mb-3">
                    {!! Form::label('active','Active', []) !!}
                    {!! Form::select('status', ['Hiển thị'=>'Hiển thị', 'Không'=>'Không'], isset($country) ? $country->status : '', ['class'=>'status form-control', 'id'=>'status']) !!}
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($country) ? $country->description : '', ['style'=>'resize:none','rows' => 3 ,'class'=>'description form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                  
                </div> -->

        </div>
    </div>
</div>
<!-- {{-- Edn- Edit Modal --}} -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        QUỐC GIA
                        <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#AddStudentModal" >THÊM QUỐC GIA</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Slug</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody id="Count_tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

