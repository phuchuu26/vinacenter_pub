@extends('frontend.master')
@section('title','Trang sản phẩm')
@section('content')
  <!-- end nav -->
  <link href="{!! asset('public/frontend/css/mycss.css') !!}" rel="stylesheet" type="text/css">
  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <li class="home"><a itemprop="url" href="/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i></li>
            <li><strong> <span itemprop="title"> {!! $title !!} {!! $name1['name'] !!}</span> </strong></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'0-3tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 0 - 3tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'3tr-5tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 3tr - 5tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'5tr-7tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 5tr - 7tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'7tr-10tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 7 - 10tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'10tr-13tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 10 - 13tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'13tr-15tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 13 - 15tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'15tr-20tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> 15 - 20tr</a></li>
            <li>&nbsp&nbsp&nbsp<a class="l-mn"
                                  href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'tren-20tr']) !!}"
                                  class="list-group-item"><i class="fab fa-sistrix"></i> Trên 20tr</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  @if(count($data) > 0)
    <div class="container mt-2">
      <div class="row">
        <div class="col-lg-12">
          <div class="row mb-2 mt-0">
            <div class="col-sm-4"><i class="far fa-arrow-alt-circle-right"></i> <span
                  style="font-weight: bold;color: #0098da;">{!! $name1['name'] !!}</span></div>
            <div class="col-sm-2"><i class="fas fa-angle-double-down"></i>
              <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'tang-dan']) !!}"
                 class="list-group-item">Giá tăng dần</a>
            </div>
            <div class="col-sm-2"><i class="fas fa-angle-double-up"></i>
              <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'giam-dan']) !!}"
                 class="list-group-item">Giá giảm dần</a>
            </div>
            <div class="col-sm-2"><i class="fas fa-list-ul"></i>
              <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'a-z']) !!}"
                 class="list-group-item">A <i class="fas fa-long-arrow-alt-right"></i> Z</a>
            </div>
            <div class="col-sm-2"><i class="fas fa-list-ul"></i>
              <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'z-a']) !!}"
                 class="list-group-item">Z <i class="fas fa-long-arrow-alt-right"></i> A</a>
            </div>
          </div>
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
        <div class="col-lg-12" id="paging_nav">{{ $data->render() }}</div>     
      </div>
    </div>
  @else
    <div class="container">
      <div class="row mt-2">
        <div class="col-lg-12">
          <div class="alert alert-warning alert-dismissible">
            <strong>Thông báo!</strong> Dữ liệu đang cập nhật
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection