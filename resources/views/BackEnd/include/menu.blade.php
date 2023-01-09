<style>
  .translated-ltr{margin-top:-40px;}
  .translated-ltr{margin-top:-40px;}
  .goog-te-banner-frame {display: none;margin-top:-20px;}

  .goog-logo-link {
    display:none !important;
  } 

  .goog-te-gadget{
    color: transparent !important;
  }
</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{asset('/home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown" id='google_translate_element'></li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            @lang('lang.language')
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{url('lang/vn')}}" class="dropdown-item">
              <div class="media">
                <img src="{{asset('frontEnd/img/vietnam.png')}}" width="20px" alt="vietnam language">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{__('vietnam')}}
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('lang/kh')}}" class="dropdown-item">
             
              <div class="media">
                <img src="{{asset('frontEnd/img/cambodia.png')}}" width="20px" alt="khmer language">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{__('khmer')}}
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('lang/en')}}" class="dropdown-item">
              
              <div class="media">
                <img src="{{asset('frontEnd/img/english.png')}}" width="20px" alt="english language">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{__('english')}}
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('lang/cn')}}" class="dropdown-item">
              
              <div class="media">
                <img src="{{asset('frontEnd/img/china.png')}}" width="20px" alt="china language" >
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{__('china')}}
                    <span class="float-right text-sm text-info"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li> -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
  </nav>