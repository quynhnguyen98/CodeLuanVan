
   <header class="app-header"><a class="app-header__logo" href="index.html">Vali</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Hello, {{Session::get('admin')->tendangnhap}}</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
     
      
      <ul class="app-menu">
        <?php 
        $js=Session::get('admin')->vaitro;
        $mang=json_decode($js, true);
        foreach($mang as $k=>$k)
        {
          if($k==0)
          {
            ?>
              <li><a class="app-menu__item {{'getDash' == request()->path() ? 'active' : ''}}" href="{{URL::to('/getDash')}}"><i class="app-menu__icon fa fa-dashboard"></i>Tổng Quan</a></li>
            <?php
          }
          else if($k==1)
          {
            ?>
              <li class="treeview"><a class="app-menu__item {{'ngay-su-kien' == request()->path() ? 'active' : ''}}" href="{{URL::to('/ngay-su-kien')}}"><i class="app-menu__icon fa fa-laptop"></i>Ngày sự kiện</a></li>
            <?php
          }
          else if($k==2)
          {
            ?>
             <li class="treeview"><a class="app-menu__item {{'cay-gia-pha' == request()->path() ? 'active' : ''}}" href="{{URL::to('/cay-gia-pha')}}" ><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Cây gia phả</span></a></li>
            <?php
          }
          else if($k==3)
          {
            ?>
              <li><a class="app-menu__item {{'quan-ly-thanh-vien' == request()->path() ? 'active' : ''}}" href="{{URL::to('/quan-ly-thanh-vien')}}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản Lý Thành Viên</span></a></li>
            <?php
          }
          else if($k==4)
          {
            ?>
                      <li><a class="app-menu__item {{'quan-ly-comment' == request()->path() ? 'active' : ''}}" href="{{URL::to('/quan-ly-comment')}}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản Lý Comment</span></a></li>
            <?php
          }
          else if($k==5)
          {
            ?>
                <li><a class="app-menu__item {{'quan-ly-tin-tuc' == request()->path() ? 'active' : ''}}" href="{{URL::to('/quan-ly-tin-tuc')}}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản Lý Tin Tức</span></a></li>
            <?php
          }
          else if($k==6)
          {
            ?>
               <li><a class="app-menu__item {{'quan-ly-hinh-anh' == request()->path() ? 'active' : ''}}" href="{{URL::to('/quan-ly-hinh-anh')}}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản Lý Hình Ảnh</span></a></li>
            <?php
          }
          else if($k==7)
          {
            ?>
              <li><a class="app-menu__item {{'quan-ly-tai-khoan' == request()->path() ? 'active' : ''}}" href="{{URL::to('/quan-ly-tai-khoan')}}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Quản Lý Tài Khoản</span></a></li>
            <?php
          }
        }
        ?>
      </ul>
  
    </aside>