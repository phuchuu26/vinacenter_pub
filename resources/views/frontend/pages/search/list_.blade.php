@extends('frontend.master')
@section('title',$search)
@section('content')
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <li class="home"> <a itemprop="url" href="http://vinacorp.net/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
          <li> <strong>Kết quả tìm kiếm với từ khóa {!! $search !!}</strong> </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Two columns content -->
<section class="main-container col2-left-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12">
        <div class="category-title">
          <h1>Tìm kiếm với từ khóa: {!! $search !!}</h1>
        </div>
        <div class="category-products">
          <div class="toolbar">
          
              <div class="pages">               
                <div id="paging_nav">{{ $data->render() }}</div>
              </div>
           
          </div>
          <ul class="products-grid mtsearch"> 
            @foreach($data as $item)
            <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
              <div class="col-item">
                <div class="col-item">
                  <div class="product-image-area"> <a class="product-image" title="{!! $item['name'] !!}" href="{!! url('san-pham/'.$item['alias']) !!}"> 
                  <img src="{!!asset('public/uploads/products/'.$item['image']) !!}" alt="{!! $item['name'] !!}"> </a> </div>
                  <div class="info">
                    <div class="info-inner">
                      <div class="item-title">
                        <h3 class="product_name"> <a title="{!! $item['name'] !!}" href="{!! url('san-pham/'.$item['alias']) !!}">{!! $item['name'] !!}</a> </h3>
                      </div>
                      <div class="item-content">
                        <div class="price-box"> <span class="special-price"> <span class="price">{!! number_format($item['value'] )!!}₫</span> </span> </div>
                      </div>
                    </div>
                    <div class="actions">
                      <a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" title=""><button  class="btn-buy btn-accent btn-cart btn btn_buy" title="Mua hàng"> <span>Mua hàng</span> </button></a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Two columns content -->
@endsection
