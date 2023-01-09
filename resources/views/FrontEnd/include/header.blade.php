<header id="main-header">
    <div class="main-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
              <div class="col-md-2">
                  <a href="index.html" class="navbar-brand">
                    <img src="{{asset('uploads/logo/'.$info->logo)}}" class="img-fluid logo channel-logo" alt="" />
                  </a>
              </div>
              <div class="col-md-8">
                
                @include('FrontEnd.include.navbar')
                  
              </div>

              <div class="navbar-right menu-right">
                <ul class="d-flex align-items-center list-inline">
                  <li class="nav-item nav-icon">
                    <a href="#" class="search-toggle device-search">
                      <i class="fa fa-search"></i>
                    </a>
                    <div class="search-box iq-search-bar d-search">
                        <form action="{{route('tim-kiem')}}" method="GET" class="searchbox">
                          <div class="form-group position-relative">
                            <input type="text" name="search" class="text search-input font-size-12"
                              placeholder="type here to search..." />
                            <i class="search-link fa fa-search"></i>
                          </div>
                        </form>
                    </div>
                  </li>
                  
                  
                  <li class="nav-item nav-icon">
                    <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center p-0" >
                      @if(Session::get('id'))
                        <i class="fa-sharp fa-solid fa-circle-user"></i>
                      @else
                        <i class="fa-sharp fa-solid fa-user-lock "></i>
                      @endif
                      <!-- <img src="{{asset('/images/cv.jpg')}}" class="img-fluid user-m rounded-circle" alt="" /> -->
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                      <div class="iq-card shadow-none m-0">
                        <div class="iq-card-body p-0 pl-3 pr-3">
                          <a href="{{route('sign_up')}}" class="iq-sub-card setting-dropdown">
                            <div class="media align-items-center">
                                &nbsp;<i class="fa fa-user-plus" aria-hidden="true" style="color: #e50914;"></i>&nbsp;&nbsp;ĐĂNG KÝ <br>
                            </div>
                          </a>
                          @if(Session::get('id'))
                              <a href="#"class="iq-sub-card setting-dropdown" onclick="document.getElementById('customerLogout').submit();">
                                <div class="media align-items-center">
                                  &nbsp;<i class="fa fa-sign-in" aria-hidden="true" style="color: #e50914;"></i>&nbsp; ĐĂNG XUẤT
                                </div>
                              </a>
                              <form action="{{route('sign_out')}}" method="post" id="customerLogout">
                                  @csrf
                              </form>

                              <a href="#" class="iq-sub-card setting-dropdown">
                                <div class="media align-items-center">
                                    &nbsp;<i class="fa fa-user text-primary"></i>&nbsp;&nbsp;THÔNG TIN BẠN<br>
                                </div>
                              </a>

                          @else
                              <a href="{{route('sign_in')}}" class="iq-sub-card setting-dropdown">
                                <div class="media align-items-center">
                                    &nbsp;<i class="fa fa-sign-in" aria-hidden="true" style="color: #e50914;"></i>&nbsp;&nbsp;ĐĂNG NHẬP
                                </div>
                              </a>
                          @endif

                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="nav-overlay"></div>
          </div>
        </div>
      </div>
    </div>
</header>



<!-- <script>
    const toggle = document.getElementById('toggleDark');
    const body = document.querySelector('body');

    toggle.addEventListener('click', function(){
        this.classList.toggle('bi-moon');
        if(this.classList.toggle('bi-brightness-high-fill')){
            body.style.background = 'black';
            body.style.color = 'white';
            body.style.transition = '2s';
        }else{
            body.style.background = 'white';
            body.style.color = 'black';
            body.style.transition = '2s';
        }

    });
</script> -->

