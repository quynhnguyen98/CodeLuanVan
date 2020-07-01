
<div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                    <a href="{{URL::to('/')}}" class="nav-brand"><img src="{{('public/frontend/images/core-img/logo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                                    <li><a href="{{URL::to('/tin-tuc')}}">Tin Tức</a></li>
                                    <li><a href="#">Phả Đồ</a> </li>
                                    <li><a href="#">Lịch</a></li>
                                    <li><a href="{{URL::to('/gioi-thieu')}}">Giới Thiệu</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <div class="top-meta-data d-flex align-items-center">
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="index.html" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Tìm họ tộc...">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                             @if(Session::get('name'))                           
                            <!-- Login -->                          
                            <!-- Submit Video -->
                                 <p style="margin-right: -55px">{{Session::get('name')}}</p>
                                 <a href="{{URL::to('/user-logout')}}" style="margin-top: 25px;margin-right: 30px">
                                    <i class="fa fa-sign-out"></i>Logout</a>
                            @else
                                <a href="{{URL::to('/login')}}" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                            @endif
                            <a href="{{URL::to('/gop-y')}}" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Góp Ý</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>