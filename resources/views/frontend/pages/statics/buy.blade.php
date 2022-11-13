@extends('frontend.master')
@section('title',$data['code'])
@section('content')
<section class="breadcrumbs">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">         
        <li class="home">
          <a itemprop="url" href="/" title="Trang chủ">
            <span itemprop="title">Trang chủ</span>
          </a>            
          <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </li>
        
          <li>
            <strong itemprop="title">Hướng dẫn mua hàng</strong>
          </li>
        
      </ul>
    </div>
  </div>
</div>
</section>
  <!-- main-container -->
  <div class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-md-9 col-sm-8">
          <div class="page-title">
            <h1>Hướng dẫn mua hàng</h1>
          </div>
          <div class="static-contain">
            <p>{!! $data['value'] !!}</p>
          </div>
        </section>
        <aside class="col-right sidebar col-md-3 col-sm-4 col-xs-12">
          <div class="block block-company">
            <div class="block-title">Thông tin </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
                <li class="item"><a href="/">Trang chủ</a></li>                
                <li class="item"><a href="{!! route('getProductAll') !!}">Sản phẩm</a></li>
                <li class="item"><a href="{!! route('getNewsIndex') !!}">Blog</a></li>              
                <li class="item"><a href="{!! route('getIntroIndex') !!}">Giới thiệu</a></li>
                <li class="item"><a href="{!! route('getContactIndex') !!}">Liên hệ</a></li>
                <li class="item"><a href="{!! route('getBuyIndex') !!}">Hướng dẫn mua hàng</a></li> 
                <li class="item"><a href="{!! route('getOrderIndex') !!}">Hướng dẫn thanh toán</a></li>  
              </ol>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <!--End main-container -->
  @endsection