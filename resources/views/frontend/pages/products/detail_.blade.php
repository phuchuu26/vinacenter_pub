@extends('frontend.master')
@section('title',$data['name'])
@section('description',strip_tags($data['sumary']))
@section('image',$data['image'])
@section('content')
<!--Start main-container -->
<link href="{!! asset('public/frontend/css/mycss.css') !!}" rel="stylesheet" type="text/css">
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <li class="home" > 
            <a itemprop="url" href="/" title="Trang chủ"> 
            <span itemprop="title" style="color:#00CC99;">Trang chủ</span> </a> 
            <i class="fas fa-caret-right"></i>
          </li>
          @if(isset($dataCateId['name']))
          <li> 
            <a itemprop="url" href="#"> 
            <span itemprop="title" style="color:#00CC99;">{!! $dataCateId['name'] !!}</span> 
            </a> 
            <i class="fas fa-caret-right"></i>
          </li>
          @endif
           @if(isset($dataCate['name']))
          <li> 
            <a itemprop="url" href="#"> 
            <span itemprop="title" style="color:#00CC99;">{!! $dataCate['name'] !!}</span> 
            </a> 
            
          </li>
          @endif          
          
        </ul>
      </div>
    </div>
  </div>
</section>


<section>
  <div class="container" style="padding-top: 0px;margin-top: 0px;">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
        <h3 itemprop="name"><i class="fas fa-cart-arrow-down"></i> {!! $data['name'] !!}</h3>
      </div>
      <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="float: right;">
        <div class="share">
            <table>
              <tbody>
                <tr>
                  <td style="width: 30%">
                    <div class="fb-like" data-href="{!! LoadStatics::getFullUrl() !!}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                    <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
                        fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));</script>  
                  </td>
                  <td valign="middle">
                    <script src="https://apis.google.com/js/platform.js" async defer>{lang: 'vi'}</script>
                    <div class="g-plusone" data-href="{!! LoadStatics::getFullUrl() !!}"></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>



<div class="container">
<div class="row">
<div class="product-essential">
  <div class="product-img-box col-lg-5 col-sm-5 col-md-5 col-xs-12">
    <div class="product-image">      
      <div class="large-image">         
        <div class="flexslider">
          <ul class="slides">
             @foreach($productImg as $item)
            <li data-thumb="{!!asset('public/uploads/products/'.$item['path']) !!}">
               <img src="{!!asset('public/uploads/products/'.$item['path']) !!}" alt="{!! $item['path'] !!}" />
            </li> 
            @endforeach
          </ul>
        </div>      
      </div>
    </div>
  </div>
  <div class="product-shop col-lg-4 col-sm-4 col-xs-12">    
    @if($total > 0)
    <p class="availability in-stock">
      <span>Còn {{$total}} sản phẩm</span>
    </p> 
    @else
    <p class="availability in-stock">
      <span>Hết hàng</span>
    </p>
    @endif   
    <div class="price-box"> 
    	<span class="special-price"> 
    		<span class="price">{!! number_format($data['value']) !!}₫
    	</span> 
    	</span> 
    	<span class="old-price"> 
    		<span class="price" style="display: none;"> </span> 
    	</span> 
    </div>
    <div class="short-description">      
      <p class="rte"> {!! $data['sumary'] !!} </p>
    </div>    
      @if($total > 0)
      <div class="add-to-box">
        <div class="add-to-cart">
          <a href="{!! url('mua-hang',[$data["id"],$data["alias"]]) !!}" readonly class="btn btn-info" role="button"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
          <a href="{!! url('mua-ngay',[$data["id"],$data["alias"]]) !!}" class="btn btn-danger" role="button"><i class="fas fa-shopping-cart"></i> Mua ngay</a>
          
          <div class="share">
            <table>
              <tbody>
                <tr>
                  <td style="width: 30%; color: #444444;">
                  <!--<span style="color: #000000;font-weight: bold;">QUÀ TẶNG MUA CÙNG SẢN PHẨM:  </span>
                  <span style="color: #444444;"></br><a href="http://vinacenter.net" target="_blank">- Miễn phí vận chuyển cho đơn hàng trên 1.000.000 vnđ</a></span>-->
              </td>
                </tr>
                <tr>
                  <td style="width: 30%; color: #444444;""> - Gọi đặt mua:
                  	<span style="color: #036;font-weight: bold;">{!! LoadStatics::getPhone()  !!}</span> (Thời gian: 8h:00 - 19h:00 thứ 2 đến thứ 7) or  Zalo/Viber: <span style="color: #036;font-weight: bold;">0909 747 235 </span></td>
                </tr>
              </tbody>
            </table>
          </div> 
        </div>
      </div>
      @endif  
      <br>
      
  </div>
  <div class="col-right sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding: 0px;">      
  
  
    <div class="well well-sm">
    	<span style="font-weight: bold;">TÌNH TRẠNG SẢN PHẨM <i class="fas fa-box-open"></i><br></span> 
    	<span>{!! $data['saleoff'] !!}</span>
    </div>
  
</div>
<div class="product-collateral">
<div class="col-sm-12">
  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
    <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả sản phẩm </a> </li>
    <!--<li> <a href="#product_tabs_custom" data-toggle="tab">Thông tin thanh toán</a> </li>
    <li> <a href="#product_tabs_custom1" data-toggle="tab">Hướng dẫn mua hàng</a> </li>-->
  </ul>
  <div id="productTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="product_tabs_description">
      <div class="std rte">
        {!! $dataPro['description'] !!}        
      </div>
    </div>
    <div class="tab-pane fade" id="product_tabs_custom">
      <div class="product-tabs-content-inner clearfix"> {!! $dataOrder['value'] !!}</div>
    </div>
    <div class="tab-pane fade" id="product_tabs_custom1">
      <div class="product-tabs-content-inner clearfix"> {!! $dataBuy['value'] !!}</div>
    </div>
  </div>
</div>
<div class="fb-comments" data-href="{{url()->current()}}" data-width="" data-numposts="5"></div>
<div class="index-large col-lg-12 col-md-8 col-sm-12 col-xs-12">
  <section class="main-container col1-layout home-content-container">
    <div class="slider-items-products">
      <div class="new_title center">
        <h2>Sản phẩm cùng loại</h2>
        <a href="#"></a> </div>
      <div class="block-content bgtrans pdbtt15">
        <div id="owl_new_products"> @foreach($product as $item)
          <div class="item">
            <div class="col-item">
              <div class="product-image-area"> <a class="product-image" title="{!!$item['name']!!}" href="{!! url('san-pham/'.$item['alias']) !!}"> <img src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}" alt="{!!$item['name']!!}" width="240" height="240" /> </a> </div>
              <div class="info">
                <div class="info-inner">
                  <div class="item-title">
                    <h3 class="product_name"> <a title="{!!$item['name']!!}" href="{!! url('san-pham/'.$item['product_id'].'/'.$item['id'].'/'.$item['alias']) !!}"> {!!$item['name']!!} </a> </h3>
                  </div>
                  <div class="item-content">
                    <div class="price-box"> <span class="special-price"> <span class="price">{!! number_format($item['value']) !!}₫</span> </span> </div>
                  </div>
                </div>
                <div class="actions">
                <a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" title=""><button  class="btn-buy btn-accent btn-cart btn btn_buy" title="Mua hàng"> <span>Mua hàng</span> </button></a>
              </div>
              </div>
            </div>
          </div>
          @endforeach </div>
      </div>
    </div>
  </section>


<!--End main-container -->
@endsection