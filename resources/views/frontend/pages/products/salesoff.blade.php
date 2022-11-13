@extends('frontend.master')
@section('title','Trang sản phẩm')
@section('content')
<!-- end nav -->  
<link href="{!! asset('public/frontend/css/mycss.css') !!}" rel="stylesheet" type="text/css">
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <li class="home"> <a itemprop="url" href="/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
          <li> <strong> <span itemprop="title"> Sản phẩm khuyến mãi</span> </strong> </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="main-container col2-left-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-lg-9 col-md-9 col-sm-12 col-md-push-3">
        <div class="category-title">
          <h1>Sản phẩm khuyến mãi</h1>
        </div>
        <div class="category-products">
          <div class="toolbar">
            <div id="toolbar_order">
              <label class="pull-right">Sắp xếp: </label>
              <div class="orderby-wrapper">
                <select name="sortBy" id="sort-by" class="right-arrow">
                  <option selected="selected" value="default">Mặc định</option>
                  <option value="alpha-asc">A → Z</option>
                  <option value="alpha-desc">Z → A</option>
                  <option value="price-asc">Giá tăng dần</option>
                  <option value="price-desc">Giá giảm dần</option>
                  <option value="created-desc">Hàng mới nhất</option>
                  <option value="created-asc">Hàng cũ nhất</option>
                </select>
                <!--cript>$('#sort-by').val('default');</script>
                <script src="../../js/sortby.js" type="text/javascript"></script>-->
              </div>
            </div>           
              <div class="pages">               
                <div id="paging_nav">{{ $data->render() }}</div>             
              </div>          
          </div>
          <div class="products-grid mtcollections">
            @foreach($data as $item)
            <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6">
              <div class="col-item">
                <div class="product-image-area"> <a class="product-image" title="{!!$item['name']!!}" href="{!! url('san-pham/'.$item['alias']) !!}"> 
                <img src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}" alt="{!!$item['name']!!}" alt="{!!$item['name']!!}"> </a> </div>
                <div class="info">
                  <div class="info-inner">
                    <div class="item-title">
                      <h3 class="product_name"> <a title="{!!$item['name']!!}" href="{!! url('san-pham/'.$item['alias']) !!}">{!!$item['name']!!}</a> </h3>
                    </div>
                    <div class="item-content">
                      <div class="price-box"> <span class="special-price"> <span class="price">{!!$item['value']!!}₫</span> </span> </div>
                    </div>
                  </div>
                  <div class="actions">
                    <a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" title=""><button  class="btn-buy btn-accent btn-cart btn btn_buy" title="Mua hàng"> <span>Mua hàng</span> </button></a>
                  </div>
                </div>
              </div><hr>
            </div>
          @endforeach
          </div>
          <div class="toolbar">                     
            <div class="pages">               
              <div id="paging_nav">{{ $data->render() }}</div>             
            </div>          
          </div>          
        </div>
      </div>
      <aside class="col-left sidebar col-lg-3 col-md-3 col-sm-12 col-md-pull-9 col-xs-12">
        <div class="side-nav-categories">
          <div class="block-title">
            <h2>Danh mục sản phẩm</h2>
          </div>
          <div class="box-content block-content box-category">
            <ul id="magicat">
              <li class="level0- level0 "> <span class="magicat-cat"> <a href="{!! route('getProductAll') !!}"> <span>Tất cả sản phẩm</span> </a> </span> </li>
              <li class="level0- level0 "> <span class="magicat-cat"> <a href="{!! route('getProductNew') !!}"> <span>Sản phẩm mới</span> </a> </span> </li>
              <li class="level0- level0 "> <span class="magicat-cat"> <a href="{!! route('getProductTop') !!}"> <span>Sản phẩm nổi bật</span> </a> </span> </li>
              <li class="level0- level0 "> <span class="magicat-cat"> <a href="{!! route('getProductSales') !!}"> <span>Sản phẩm khuyến mãi</span> </a> </span> </li>
            </ul>
          </div>
        </div>
        <div class="block block-banner hidden-sm hidden-xs">
          <a href="/"> 
            <img src="{!! asset('public/images/block-banner.png')!!}" alt="vinacorp"> 
          </a> 
        </div>
        <div id="bw-statistics" class="block"></div>
      </aside>
    </div>
  </div>
</section>  
@endsection