@extends('frontend.master')
@section('title',$search)
@section('content')
  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <li class="home"><a itemprop="url" href="http://vinacorp.net/" title="Trang chủ"> <span itemprop="title">Trang chủ</span>
              </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></li>
            <li><strong>Tìm kiếm</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Two columns content -->
  <section class="main-container col2-left-layout mt-0 pt-0">
    <div class="main container mt-0">
      <div class="row">
        <div class="col-lg-6 h5">
            Kết quả tìm kiếm với từ khóa: {!! $search !!}
        </div>
        <div class="col-lg-6 mt-2 mb-2">
          <div class="pages pull-right">
            <div id="paging_nav">{{ $data->render() }}</div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            @foreach($data as $item)
              <div class="col-6 col-lg-3">
                <div class="product-grid7">
                  <div class="product-image7">
                    <a href="{!! url('san-pham/'.$item['alias']) !!}">
                      <img class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                      <img class="pic-2" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
                    </a>
                    <span class="product-new-label">New</span>
                  </div>
                  <div class="product-content bg-light">
                    <h3 class="title">
                      <a  href="{!! url('san-pham/'.$item['alias']) !!}" title="{!! $item['name'] !!}">
                        {!! str_limit($item['name'],30,'...') !!}
                      </a>
                    </h3>
                    <ul class="social1 list-inline mb-0">
                      <li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
                      <li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag" title="Thêm vào Giỏ hàng"></a></li>
                      <li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart" title="Mua ngay"></a></li>
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
        <div class="col-lg-12 mt-2">
          <div class="pages">
            <div id="paging_nav">{{ $data->render() }}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Two columns content -->
@endsection
