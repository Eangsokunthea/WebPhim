
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('/home')}}" class="brand-link">
      <img src="{{asset('/BackEnd')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Web Xem Phim</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/BackEnd')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{asset('/home')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{route('info.index')}}" class="nav-link">
            <i class="fa-solid fa-circle-info"></i>
              <p>&nbsp;
                Thông tin website
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('user.index')}}" class="nav-link">
            <i class="fa-solid fa-user-plus"></i>
              <p>&nbsp;
                Quản trị viên 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('customer.index')}}" class="nav-link">
            <i class="fa-solid fa-hand"></i>
              <p>&nbsp;&nbsp;
                Người Dùng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('genre.index')}}" class="nav-link">
            <i class="fa-solid fa-calendar-days"></i>
              <p>&nbsp;&nbsp;
                Thẻ loại 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('category.index')}}" class="nav-link">
            <i class="fa-solid fa-list"></i>
              <p>&nbsp;&nbsp;
                Danh mục
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('country.index')}}" class="nav-link">
            <i class="fa-solid fa-ticket"></i>
              <p>&nbsp;&nbsp;
                Quốc gia
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('movie.index')}}" class="nav-link">
            <i class="fa-solid fa-film"></i>
              <p>&nbsp;&nbsp;
                Phim
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('episode.index')}}" class="nav-link">
            <i class="fa-sharp fa-solid fa-repeat"></i>
              <p>&nbsp;&nbsp;
                Tập Phim
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Manage Tập Phim</p>
                </a>
              </li>
            </ul> -->
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('list_comment')}}" class="nav-link">
            <i class="fa-solid fa-comment"></i>
              <p>&nbsp;&nbsp;
                Bình luận
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>