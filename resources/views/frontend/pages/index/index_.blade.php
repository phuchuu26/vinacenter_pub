@extends('frontend.master')
@section('title','Vina Center')
@section('content')
<style>
#myCarousel {
    margin: 0px !important;
}
#add img{
    padding-top:15px;
}



img{max-width:100%;}
  *{transition: all .5s ease;-moz-transition: all .5s ease;-webkit-transition: all .5s ease}
.my-list {
    width: 100%;
    padding: 10px;
    border: 1px solid #f5efef;
    float: left;
    margin: 15px 0;
    border-radius: 5px;
    box-shadow: 2px 3px 0px #e4d8d8;
    position:relative;
    overflow:hidden;
}
.my-list h3{
    text-align: left;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    margin: 0px;
    padding: 0px;
    border-bottom: 1px solid #ccc4c4;
    margin-bottom: 5px;
    padding-bottom: 5px;
    }
  .my-list span{float:left;font-weight: bold;}
  .my-list span:last-child{float:right;}
  .my-list .offer{
    width: 100%;
    float: left;
    margin: 5px 0;
    border-top: 1px solid #ccc4c4;
    margin-top: 5px;
    padding-top: 5px;
    color: #afadad;
    }
  .detail {
    position: absolute;
    top: -100%;
    left: 0;
    text-align: center;
    background: #fff;height: 100%;width:100%;
  
}
.detail p{
	text-align: left;
	padding-left: 5px;
}  
.my-list:hover .detail{top:0;}
div.round1 {
  border: 2px solid #CCCCCC;
  border-radius: 5px;
  height:25px;
}

@media only screen and (max-device-width: 480px) {
    img {
        width: 200px;
    }

}



  h3.h3{text-align:center;margin:1em;text-transform:capitalize;font-size:1.7em;}
  /********************* Shopping Demo-7 **********************/
.product-grid7{font-family:'Roboto Slab',serif;position:relative;z-index:1}
.product-grid7 .product-image7{border:1px solid rgba(0,0,0,.1);overflow:hidden;perspective:1500px;position:relative;transition:all .3s ease 0s}
.product-grid7 .product-image7 a{display:block}
.product-grid7 .product-image7 img{width:100%;height:auto}
.product-grid7 .pic-1{opacity:1;transition:all .5s ease-out 0s}
.product-grid7 .pic-2{opacity:0;transform:rotateY(-90deg);position:absolute;top:0;left:0;transition:all .5s ease-out 0s}
.product-grid7:hover .pic-2{opacity:1;transform:rotateY(0)}
.product-grid7 .social{padding:0;margin:0;list-style:none;position:absolute;bottom:3px;left:-20%;z-index:1;transition:all .5s ease 0s}
.product-grid7:hover .social{left:17px}
.product-grid7 .social li a{color:#fff;background-color:#333;font-size:16px;line-height:40px;text-align:center;height:40px;width:40px;margin:15px 0;border-radius:50%;display:block;transition:all .5s ease-in-out}
.product-grid7 .social li a:hover{color:#fff;background-color:#78e08f}
.product-grid7 .product-new-label{color:#fff;background-color:red;padding:5px 10px;border-radius:5px;display:block;position:absolute;top:10px;left:10px}
.product-grid7 .product-content{text-align:center;padding:20px 0 0}
.product-grid7 .title{font-size:15px;font-weight:600;text-transform:capitalize;margin:0 0 10px;transition:all .3s ease 0s}
.product-grid7 .title a{color:#333}
.product-grid7 .title a:hover{color:#78e08f}
.product-grid7 .rating{color:#78e08f;font-size:12px;padding:0;margin:0 0 10px;list-style:none}
.product-grid7 .price{color:red;font-size:20px;font-family:Lora,serif;font-weight:700;margin-bottom:8px;text-align:center;transition:all .3s}
.product-grid7 .price span{color:#999;font-size:14px;font-weight:700;text-decoration:line-through;margin-left:7px;display:inline-block}
@media only screen and (max-width:990px){.product-grid7{margin-bottom:30px}
}

</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--slider--->
<div class="container">
    <div style="padding-top: 5px;padding-bottom: 5px;">
      <i class="fas fa-laptop"></i> 
      <span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;color: red;"> Mới nhất</span> 
    </div> 
    <div class="row">
        @foreach($productRan as $item)
        <div class="col-sm-3">
            <div class="product-grid7">
                <div class="product-image7">
                    <a href="{!! url('san-pham/'.$item['alias']) !!}">
                        <img class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                        <img class="pic-2" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                    </a>
                    <ul class="social">
                        <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                        <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag" title="Thêm vào Giỏ hàng"></a></li>
                        <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart" title="Mua ngay"></a></li>
                    </ul>
                    <span class="product-new-label">New</span>
                </div>
                <div class="product-content">
                    <h3 class="title">
                      <a  href="{!! url('san-pham/'.$item['alias']) !!}" title="{!! $item['name'] !!}">
                        {!! str_limit($item['name'],30,'...') !!}
                      </a>
                    </h3>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="price">
                      {!! number_format($item['value'] )!!}₫
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
        <img src="{!! isset($item["path"]) ? asset('public/uploads/banner/'.$item["path"]) : asset('public/images/nophoto.png') !!}" />
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
    <img class="right-img-index" alt="banner-img" src="{!! isset($item["path"]) ? asset('public/uploads/banner/'.$item["path"]) : asset('public/images/nophoto.png') !!}" alt="vinacenter" height="119px;" />
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
       Bán chạy nhất
    </span> 
  </div>
  <div>&nbsp</div>
  <div class="row">    
    @foreach($productSaleTop as $item)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid7">
                <div class="product-image7">
                    <a href="{!! url('san-pham/'.$item['alias']) !!}">
                        <img class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                        <img class="pic-2" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                    </a>
                    <ul class="social">
                        <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                        <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag" title="Thêm vào Giỏ hàng"></a></li>
                        <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart" title="Mua ngay"></a></li>
                    </ul>
                    
                </div>
                <div class="product-content">
                    <h3 class="title">
                      <a  href="{!! url('san-pham/'.$item['alias']) !!}">
                        {!! str_limit($item['name'],30,'...') !!}
                      </a>
                    </h3>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="price">
                      {!! number_format($item['value'] )!!}₫
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
        <div class="col-md-3 col-sm-6">
            <div class="product-grid7">
                <div class="product-image7">
                    <a href="{!! url('san-pham/'.$item['alias']) !!}">
                        <img class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                        <img class="pic-2" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                    </a>
                    <ul class="social">
                        <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                        <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag" title="Thêm vào Giỏ hàng"></a></li>
                        <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart" title="Mua ngay"></a></li>
                    </ul>
                    
                </div>
                <div class="product-content">
                    <h3 class="title">
                      <a  href="{!! url('san-pham/'.$item['alias']) !!}">
                        {!! str_limit($item['name'],30,'...') !!}
                      </a>
                    </h3>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <div class="price">
                      {!! number_format($item['value'] )!!}₫
                    </div>
                </div>
            </div>
        </div>
        @endforeach
  </div>



</div>
</div>

</section>
@endsection