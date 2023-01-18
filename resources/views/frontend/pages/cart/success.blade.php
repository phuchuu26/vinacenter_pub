@extends('frontend.master')
@section('title',"Đặt hàng")
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
            <strong itemprop="title">Đặt hàng</strong>
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
        <section class="col-main col-md-12 col-sm-8 alert alert-success alert-dismissible">
              <h2>TẠO ĐƠN HÀNG THÀNH CÔNG.</h2>
              <h5>Quý khách Thanh toán khi nhận hàng (COD)</h5>
              <p>Xin cảm ơn Quý khách đã đặt hàng, chúng tôi sẽ liên hệ với Quý khách trong thời gian sớm nhất. Xin trân trọng cảm ơn!</p>              
        </section>
        <div class="col-lg-12 mt-4">
        <table class="table table-hover">
          <thead class="bg-secondary">
          <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
          </tr>
          </thead>
          <tbody>
          @foreach($detail as $item)
            <tr>
              <td>{!! $item->name !!}</td>
              <td><img width="80px;" src="{!! asset('public/uploads/products/'.$item->options->img) !!}"></td>
              <td>{!! $item->qty !!}</td>
              <td>
                  @if($item->options->yprice != "")
                  {!! number_format($item->options->yprice*$item->qty) !!}₫
                  @else
                  {!! number_format($item->price*$item->qty) !!}₫
                  @endif
              </td>
            </tr>
            @endforeach
            <tr style="background-color: #EEEEEE; vertical-align:middle;">
              <td colspan="4" style="height: 50px;text-align: right; padding-right: 10px;vertical-align:middle;">
                Tổng cộng :
                <span colspan="2" style="font-weight: bold;color: red;">{!! number_format($total) !!} ₫</span>
                <br>
                Hoa hồng của bạn:
                <span colspan="2" style="font-weight: bold;color: red;">{!! number_format($discount_saler) !!} ₫</span>
                
              </td>

            </tr>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
  <!--End main-container -->
  @endsection