<header class="header-container">    
    <div class="header container">
<div class="row">
        <div class="col-lg-2">
          <!-- Header Logo -->
          <a class="logo" title="vinacenter" href="/vina">
          <img alt="vinacenter" src="{!! asset('public/uploads/banner/'.LoadStatics::getLogo()) !!}"></a>
          <!-- End Header Logo -->
        </div>
        <div class="col-lg-4" style="margin-top: 30px;">
          <!-- Search-col -->
          <form action="{{ route('frontend.search') }}" method="get">
            <div class="input-group">             
              <input type="text" class="form-control" placeholder="Nhập từ khóa cần tìm" value="{{ Request::get('search') }}" maxlength="70" name="search" id="txtSearch">
              <div class="input-group-btn">
                <button class="btn btn-primary" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </div>
            </div>    
          </form>
          <!-- End Search-col -->
        </div>
        <style>
          ul#menu li {
            display:inline;
            padding-right: 5px;
            
          }
          ul#menu li a
          {
            color: white;
            font-weight: bold;
          }
          ul#menu li a:hover
           {
             color: red;
           }
        </style>

        <div class="col-lg-6" style="margin-top: 30px;float: right;">
          <ul id="menu" style="float: right;">
            <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getIntroIndex') !!}"> Giới Thiệu</a></li>
            <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getServiceIndex') !!}"> Dịch Vụ</a></li>
            <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getNewsIndex') !!}"> Tin Tức</a></li>            
            <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getContactIndex') !!}"> Liên Hệ</a></li>
            @if (!Auth::guest())
              <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getOrderList') !!}" target="_blank"> {{ Auth::user()->name }}</a></li>
            <!--  <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getOrderList') !!}" target="_blank"> Quản lý đơn hàng</a></li>-->
              <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="{!! route('getLogout') !!}"> Thoát</a></li>
            @else
              <li><i class="fas fa-caret-right" style="color: #0098da;;"></i><a href="https://vinacenter.vn/vnclogin"> Đăng Nhập</a></li>
            @endif

          </ul>
          <div style="margin-top: 10px;color: #00FFFF ;float: right;">
          <i class="fas fa-map-marker-alt">&nbsp &nbsp</i><span>{!! LoadStatics::getAddress()  !!}</span>
          &nbsp &nbsp<i class="fas fa-phone-volume"></i> : <span>{!! LoadStatics::getPhone()  !!}</span>
          </div>
        </div>





      </div>
    </div>
    </header>
    <!-- Header Logo -->
        <a class="logo-small" title="vinacenter" href="#"><img alt="vinacenter" src="{!! asset('public/uploads/banner/'.LoadStatics::getLogoRoll()) !!}"></a>
        <!-- End Header Logo -->