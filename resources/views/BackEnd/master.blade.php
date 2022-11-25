<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{csrf_token()}}"></meta>
  <title>@yield('title')</title>

  <link rel="shortcut icon" href="{{asset('uploads/logo/'.$info->logo)}}" type="image/x-icon" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/BackEnd')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/BackEnd')}}/dist/css/adminlte.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/BackEnd')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- css datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->
  


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('BackEnd.include.menu')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('BackEnd.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  @include('BackEnd.include.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/BackEnd')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/BackEnd')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/BackEnd')}}/dist/js/adminlte.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('/BackEnd')}}/dist/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="{{asset('/BackEnd')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/BackEnd')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/BackEnd')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/BackEnd')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- OPTIONAL SCRIPTS AND CHART -->
<script src="{{asset('/BackEnd')}}/plugins/chart.js/Chart.min.js"></script>
<script src="{{asset('/BackEnd')}}/dist/js/demo.js"></script>
<script src="{{asset('/BackEnd')}}/dist/js/pages/dashboard3.js"></script>

<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- datepicker -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script type="text/javascript">
  $(document).on('change','.file_image', function(){
      var movie_id = $(this).data('movie_id');
      var files = $("#file-"+movie_id)[0].files;

      var image = document.getElementById("file-"+movie_id).files[0];
      var form_data = new FormData();

      form_data.append("file", document.getElementById("file-"+movie_id).files[0]);
      form_data.append("movie_id", movie_id);

      $.ajax({
        url:"{{route('update-image-movie-ajax')}}",
            method:"POST",
            headers:{
              'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            data:form_data,
            
            contentType:false,
            cache:false,
            processData:false,

            success:function()
            {
              location.reload();
              $('#success_image').html('<span class="text-success">Cập nhật thành công</span>');
            }
      });
  });
</script>

<!-- ajax model -->
<!-- <script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function(){
          var movie_id = $(this).val();
          $('#editModal').modal('show');
          $.ajax({
            url:"/edit-movie/"+movie_id,
            method:"GET",
            success:function(response)
            {
              console.log(response.movie.title);
            }
        });

        });
    });
</script>   -->

<!-- danh muc ajax -->
<script type='text/javascript'>
    $('.category_choose').change(function(){
        var category_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('category-choose')}}",
            method:"GET",
            data:{category_id:category_id, movie_id:movie_id},
            success:function(data)
            {
              // $('#show_movie').html(data);
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
<!-- quoc gia ajax -->
<script type='text/javascript'>
    $('.country_choose').change(function(){
        var country_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('country-choose')}}",
            method:"GET",
            data:{country_id:country_id, movie_id:movie_id},
            success:function(data)
            {
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
<!-- phude ajax -->
<script type='text/javascript'>
    $('.phude_choose').change(function(){
        var phude_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('phude-choose')}}",
            method:"GET",
            data:{phude_val:phude_val, movie_id:movie_id},
            success:function(data)
            {
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
<!-- trang thai ajax -->
<script type='text/javascript'>
    $('.trangthai_choose').change(function(){
        var trangthai_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('trangthai-choose')}}",
            method:"GET",
            data:{trangthai_val:trangthai_val, movie_id:movie_id},
            success:function(data)
            {
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
<!-- phimhot ajax -->
<script type='text/javascript'>
    $('.phimhot_choose').change(function(){
        var phimhot_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('phimhot-choose')}}",
            method:"GET",
            data:{phimhot_val:phimhot_val, movie_id:movie_id},
            success:function(data)
            {
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
<!-- thuocphim ajax -->
<script type='text/javascript'>
    $('.thuocphim_choose').change(function(){
        var thuocphim_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('thuocphim-choose')}}",
            method:"GET",
            data:{thuocphim_val:thuocphim_val, movie_id:movie_id},
            success:function(data)
            {
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
<!-- dinhdang ajax -->
<script type='text/javascript'>
    $('.resolution_choose').change(function(){
        var resolution_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url:"{{route('resolution-choose')}}",
            method:"GET",
            data:{resolution_val:resolution_val, movie_id:movie_id},
            success:function(data)
            {
              alert('Thay đổi thành công.');
            }
        });
    })
</script>
 
<!-- data table -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- slug  -->
<script type="text/javascript">
 
  function ChangeToSlug()
      {
          var slug;       
          //Lấy text từ thẻ input title 
          slug = document.getElementById("slug").value;
          slug = slug.toLowerCase();
          //Đổi ký tự có dấu thành không dấu
              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
              slug = slug.replace(/đ/gi, 'd');
              //Xóa các ký tự đặt biệt
              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
              //Đổi khoảng trắng thành ký tự gạch ngang
              slug = slug.replace(/ /gi, "-");
              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
              slug = slug.replace(/\-\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-/gi, '-');
              slug = slug.replace(/\-\-/gi, '-');
              //Xóa các ký tự gạch ngang ở đầu và cuối
              slug = '@' + slug + '@';
              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
              //In slug ra textbox có id “slug”
          document.getElementById('convert_slug').value = slug;
      }

</script>

<script type="text/javascript">
    $(function(){
      $(document).on('click', '#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      });
    });  
</script>

<script type="text/javascript">
    $('.order_position').sortable({
        placeholder : 'ui-state-highlight',
        update: function(event, ui){
          var array_id = [];
          $('.order_position tr').each(function(){
            array_id.push($(this).attr('id'));
          })
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{route('resorting_category')}}",
            method:"POST",
            data:{array_id:array_id},
            success:function(data){
              alert('Sắp xếp thứ tự thành công');
            }
          })
        }
    })
</script>

<script type="text/javascript">
  $('.select-year').change(function(){
    var year = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    var _token = $('input[name="_token"]').val();
    // alert(year);
    // alert(id_phim);
    $.ajax({
      url:"{{url('/update-year-phim')}}",
      method:"POST",
      data:{year:year, id_phim:id_phim, _token:_token},
      success:function()
      {
        alert('Thay đổi phim theo năm '+year+' thành công');
      }
    });
  })
</script>

<script type="text/javascript">
  $('.select-season').change(function(){
    var season = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    var _token = $('input[name="_token"]').val();
    // alert(year);
    // alert(id_phim);
    $.ajax({
      url:"{{url('/update-season-phim')}}",
      method:"POST",
      data:{season:season, id_phim:id_phim, _token:_token},
      success:function()
      {
        alert('Thay đổi phim theo season '+season+' thành công');
      }
    });
  })
</script>

<script type="text/javascript">
  $('.select-topview').change(function(){
    var topview = $(this).find(':selected').val();
    var id_phim = $(this).attr('id');
    // var _token = $('input[name="_token"]').val();
   
    if(topview==0){
      var text = 'Ngày';
    }else if(topview==1){
      var text = 'Tuần';
    }else{
      var text = 'Tháng';
    }
    
    $.ajax({
      url:"{{url('/update-topview-phim')}}",
      method:"GET",
      data:{topview:topview, id_phim:id_phim},
      success:function()
      {
        alert('Thay đổi phim theo topview '+text+' thành công');
      }
    });
  })
</script>

<script type="text/javascript">
    $('.select-movie').change(function(){
        var id = $(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('select-movie')}}",
            method:"GET",
            data:{id:id},
            success:function(data)
            {
              $('#show_movie').html(data);
            }
        });
    })
</script>


</body>
</html>


