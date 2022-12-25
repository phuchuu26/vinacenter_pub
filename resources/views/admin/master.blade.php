<!DOCTYPE html>
<html>

<head>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8SPR7VVHGM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8SPR7VVHGM');
</script>
    <title>VINA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{!! asset('public/vnc_admin/css/style.css') !!}" rel='stylesheet' type='text/css'/>
    <link href="{!! asset('public/vnc_admin/css/style-responsive.css') !!}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{!! asset('public/vnc_admin/css/font.css') !!}" type="text/css"/>
    <link href="{!! asset('public/vnc_admin/css/font-awesome.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('public/vnc_admin/css/morris.css') !!}" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="{!! asset('public/vnc_admin/css/monthly.css') !!}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- //calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js" integrity="sha512-3tlegnpoIDTv9JHc9yJO8wnkrIkq7WO7QJLi5YfaeTmZHvfrb1twMwqT4C0K8BLBbaiR6MOo77pLXO1/PztcLg==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{!! asset('public/vnc_admin/templates/js/plugin/ckeditor/ckeditor.js') !!}"></script>
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="{!! asset('public/vnc_admin/templates/js/myscript.js') !!}" type="text/javascript" charset="utf-8"></script>
    <script defer src="{!! asset('public/vnc_admin/templates/js/myscript.js') !!}?v=
    <?php if( file_exists(public_path('public/vnc_admin/templates/js/myscript.js') )) echo filemtime( public_path('public/vnc_admin/templates/js/myscript.js')  ) ?>"
     type="text/javascript"></script>


    <script src="{!! asset('public/vnc_admin/js/raphael-min.js') !!}"></script>
    <script src="{!! asset('public/vnc_admin/js/morris.js') !!}"></script>
    <script src="{!! asset('public/vnc_admin/js/myscript.js') !!}"></script>
    <style>
        .pagination>li>a, .pagination>li>span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination>li.active>span {
            background-color: #ccc;
        }
        .navbar-dark .nav-item > .nav-links.active  {
            color:white;
            background-color: red;
        }
    </style>
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo">
                VINACENTER
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                       
                        <span class="username">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="{!! route('admin.changepw',Auth::user()->id) !!}"><i class="fa fa-lock"></i> Đổi mật khẩu</a></li>                        
                        <li><a href="{!! url('logout') !!}"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu navbar-nav" id="nav-accordion">
                    <li class="nav-item">
                        <a class="nav-links" href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span>Đơn hàng </span>
                        </a>
                        <ul class="sub">
							<li><a href="{!! route('getOrderList') !!}">Danh sách</a></li>
                            <li><a href="{!! route('getBonusOrder') !!}">Chiếc khấu</a></li>
                            @if (\Auth::user()->role == 1)
                                <li><a href="{!! route('createOrder') !!}">Tạo đơn hàng</a></li>
                            @endif
                        </ul>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-links" href="{!! route('login.info_user') !!}">
                            <i class="fa fa-dashboard"></i>
                            <span>Thông tin cá nhân</span>
                        </a>
                    </li>
                    @if(Auth::user()->role == 1)
                    <li>
                        <a href="{!! route('getContactList') !!}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Tin nhắn</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-product-hunt" aria-hidden="true"></i>
                            <span>Sản phẩm </span>
                        </a>
                        <ul class="sub">
                            <li><a href="{!! route('getCateList') !!}">Loại sản phẩm</a></li>
                            <li><a href="{!! route('getProductList') !!}">Danh sách</a></li>
                            <li><a href="{!! route('getListVoucher') !!}">Quản lý voucher</a></li>
                            <li><a href="{!! route('getProductListApprove') !!}">Duyệt sản phẩm</a></li>

                        </ul>
                    </li>
                 
                    <li>
                        <a href="{!! route('getListServiceCustomer') !!}">
                            <i class="fa fa-medkit" aria-hidden="true"></i>
                            <span>Dịch vụ sửa chữa</span>
                        </a>
                    </li>

                    <li>
                        <a href="{!! route('getChartSale') !!}">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                            <span>Thống kê bán hàng</span>
                        </a>
                    </li>

                    <li>
                        <a href="{!! route('getNewsList') !!}">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            <span>Tin tức</span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('getStaticsList') !!}">
                            <i class="fa fa-anchor" aria-hidden="true"></i>
                            <span>Statics </span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('getSupportList') !!}">
                            <i class="fa fa-server" aria-hidden="true"></i>
                            <span>Support </span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('getImagetList') !!}">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                            <span>Logo-Banner </span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('getServiceEdit') !!}">
                            <i class="fa fa-server" aria-hidden="true"></i>
                            <span>Dịch vụ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('getMaintenanceEdit') !!}">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span>Chính sách bảo hành </span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('admin.changepw',Auth::user()->id) !!}">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('getUserList') !!}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>User </span>
                        </a>
                    </li>
                    @else

                        {{-- user bronze, silver, gold --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                <span>Sản phẩm </span>
                            </a>
                            <ul class="sub">
                                {{-- <li><a href="{!! route('getCateList') !!}">Loại sản phẩm</a></li> --}}
                                <li><a href="{!! route('getProductList') !!}">Danh sách</a></li>
                                <li><a href="{!! route('getProductListApproveUser') !!}">Duyệt sản phẩm</a></li>

                            </ul>
                        </li>

                    @endif
                    <li>
                        <a href="{!! url('logout') !!}">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @include('admin.blocks.error')
            @include('admin.blocks.flash')
            @yield('content')
        </section>
        <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2022 Vinacenter. All rights reserved</p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{!! asset('public/vnc_admin/js/bootstrap.js') !!}"></script>
<script src="{!! asset('public/vnc_admin/js/jquery.dcjqaccordion.2.7.js') !!}"></script>
<script src="{!! asset('public/vnc_admin/js/scripts.js') !!}"></script>
<script src="{!! asset('public/vnc_admin/js/jquery.slimscroll.js') !!}"></script>
<script src="{!! asset('public/vnc_admin/js/jquery.nicescroll.js') !!}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{!! asset('public/vnc_admin/js/flot-chart/excanvas.min.js') !!}"></script><![endif]-->
<script src="{!! asset('public/vnc_admin/js/jquery.scrollTo.js') !!}"></script>
<script>
    $(document).ready(function() {
        $('.navbar-nav .nav-item').click(function(){
            $('.navbar-nav .nav-item.active').removeClass('active');
            $(this).addClass('active');
        })
    });
</script>
</body>
</html>
