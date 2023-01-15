@extends('frontend.master')
@section('title','Vina Center')
@section('content')

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!--slider--->
  <div class="container">
    <div style="padding-top: 5px;padding-bottom: 5px;">
      <i class="fas fa-laptop"></i>
      <span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;color: red;"> Mới nhất</span>
    </div>
    <div class="row">
      @foreach($productRan as $item)
        <div class="col-6 col-lg-3">
          <div class="product-grid7">
            <div class="product-image7">
              <a href="{!! url('san-pham/'.$item['alias']) !!}">
                <img class="pic-1"
                     src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                <img class="pic-2"
                     src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
              </a>
              <span class="product-new-label">New</span>
            </div>
            <div class="product-content bg-light">
              <h3 class="title">
                <a href="{!! url('san-pham/'.$item['alias']) !!}" title="{!! $item['name'] !!}">
                  {!! str_limit($item['name'],30,'...') !!}
                </a>
              </h3>
              <ul class="social1 list-inline mb-0">
                <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag"
                       title="Thêm vào Giỏ hàng"></a></li>
                <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart"
                       title="Mua ngay"></a></li>
              </ul>
              <div class="mb-4">
                <span class="price">{!! number_format($item['value'] )!!}₫</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-sm-9">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            @foreach(LoadStatics::getSlider() as $key=>$item)
              @if($key==0)
                <div class="item active">
                  @else
                    <div class="item">
                      @endif
                      <img
                          src="{!! isset($item["path"]) ? asset('public/uploads/banner/'.$item["path"]) : asset('public/images/nophoto.png') !!}"/>
                    </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
          </div>
        </div>

        <div class="col-sm-3" style="padding-top:20px;">
          @foreach(LoadStatics::getIndexBannerRight() as $item)
            <div class="add" style="padding-bottom:5px;">

              <a href="">
                <img class="right-img-index" alt="banner-img"
                     src="{!! isset($item["path"]) ? asset('public/uploads/banner/'.$item["path"]) : asset('public/images/nophoto.png') !!}"
                     alt="vinacenter" height="119px;"/>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!--end slider--->

    <!--
    <div class="container">

        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="#">Dưới 3 triệu</a></li>
            <li><a href="#">Dưới 5 triệu</a></li>
            <li><a href="#">Trên 5 triệu</a></li>
          </ul>
        </div>
    </div>
    -->
    <div class="container">
      <div style="padding-top: 5px;padding-bottom: 5px; border-bottom: 1px solid #CCCCCC;width: 100%;">
        <i class="fas fa-shopping-bag"></i>
        <span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;color: red;">
          Sản phẩm đã qua sử dụng
    </span>
      </div>
      <div>&nbsp</div>
      <div class="row">
        @foreach($productSaleTop as $item)
          <div class="col-6 col-lg-3">
            <div class="product-grid7">
              <div class="product-image7">
                <a href="{!! url('san-pham/'.$item['alias']) !!}">
                  <img class="pic-1"
                       src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                  <img class="pic-2"
                       src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                </a>
                <span class="product-new-label">New</span>
              </div>
              <div class="product-content bg-light">
                <h3 class="title">
                  <a href="{!! url('san-pham/'.$item['alias']) !!}" title="{!! $item['name'] !!}">
                    {!! str_limit($item['name'],30,'...') !!}
                  </a>
                </h3>
                <ul class="social1 list-inline mb-0">
                  <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                  <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag"
                         title="Thêm vào Giỏ hàng"></a></li>
                  <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart"
                         title="Mua ngay"></a></li>
                </ul>
                <div class="mb-4">
                  <span class="price">{!! number_format($item['value'] )!!}₫</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>

  <div class="container">
    <div style="padding-top: 5px;padding-bottom: 5px; border-bottom: 1px solid #CCCCCC;width: 100%;">
      <i class="fas fa-shopping-cart"></i>
      <span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;color: red;">
       Khuyến mãi
    </span>
    </div>
    <div>&nbsp</div>
    <div class="row">
      @foreach($productSale as $item)
        <div class="col-6 col-lg-3">
          <div class="product-grid7">
            <div class="product-image7">
              <a href="{!! url('san-pham/'.$item['alias']) !!}">
                <img class="pic-1"
                     src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                <img class="pic-2"
                     src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
              </a>
              <span class="product-new-label">New</span>
            </div>
            <div class="product-content bg-light">
              <h3 class="title">
                <a href="{!! url('san-pham/'.$item['alias']) !!}" title="{!! $item['name'] !!}">
                  {!! str_limit($item['name'],30,'...') !!}
                </a>
              </h3>
              <ul class="social1 list-inline mb-0">
                <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag"
                       title="Thêm vào Giỏ hàng"></a></li>
                <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart"
                       title="Mua ngay"></a></li>
              </ul>
              <div class="mb-4">
                <span class="price">{!! number_format($item['value'] )!!}₫</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  </section>
@endsection