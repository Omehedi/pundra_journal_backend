<section>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container">
                @php
                $app_name = configs(['website_name']);
                 @endphp
                <a class="navbar-brand" href="#"><strong style="text-transform: uppercase">{{$app_name}}</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav media-aside-right mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/')}}">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        @guest('user_web')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{url('login')}}">
                                    <i class="fa fa-sign-in"></i>
                                    <span>SignIn</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{url('registration')}}">
                                    <i class="fa fa-registered"></i>
                                    <span>Registration</span>
                                </a>
                            </li>
                        @endguest
                        @if(auth('user_web')->check())
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span>{{auth('user_web')->user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu_item"><a class="dropdown-item" href="{{url('auth/profile')}}">Profile</a></li>
                                <li class="menu_item"><a class="dropdown-item" href="">Information's</a></li>
                                <li class="menu_item"><a class="dropdown-item" href="{{url('auth/logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="header">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto d-lg-none d-flex align-items-center">
                    <button class="offcanvas-toggle">
                        <span></span>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="page-heading-section section bg-parallax"  data-bg-image="{{configs(['website_banner'])}}" data-overlay="50"  style="background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="page-heading-content text-center">
                <h3 class="title">{{isset($title) ? $title : ''}}</h3>
            </div>
        </div>
    </div>
</section>
