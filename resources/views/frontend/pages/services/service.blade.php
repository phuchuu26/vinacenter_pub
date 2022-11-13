@extends('frontend.master')
@section('title','Trang Dịch vụ')
@section('content')  
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <li class="home"> <a itemprop="url" href="/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
          <li> <strong itemprop="title">Dịch vụ</strong> </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="blog-wrapper" id="main">
          <div class="site-content" id="primary">
            <div role="main" id="content">              
            {!! $data['content'] !!}
          </div>
        </div>
      </div>
      <div class="fb-comments" data-href="{{url()->current()}}" data-width="" data-numposts="5"></div>
    </div>
  </div>
</div>
@endsection    