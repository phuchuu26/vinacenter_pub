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

  <style>
      .border1 {
          border-radius: 20px;
          background-color: #EEEEEE;
          color: black;

          padding: 20px;
      }
  </style>
  <!-- main-container -->
  <div class="container mt-4">
    @if ($total > 0)
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h2>TẠO ĐƠN HÀNG THÀNH CÔNG.</h2>
          <h5>- Quý khách thanh toán chuyển khoản vui lòng ghi rõ nội dung thanh toán với mã đơn hàng là : <span style="font-weight: bold;">{{ $atm }}</span>
          </h5>
          <p>Xin cảm ơn Quý khách đã đặt hàng, chúng tôi sẽ liên hệ với Quý khách trong thời gian sớm nhất. Xin trân trọng cảm ơn!</p>
        </div>
      </div>
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
              </td>

              <td colspan="4" style="height: 50px;text-align: right; padding-right: 10px;vertical-align:middle;">
                Tổng cộng :
                <span colspan="2" style="font-weight: bold;color: red;">{!! number_format($total) !!} ₫</span>

                @if($discount_saler > 0)
                    <br>
                    Hoa hồng của bạn:
                    <span colspan="2" style="font-weight: bold;color: red;">{!! number_format($discount_saler) !!} ₫</span>
                  @endif

              </td>

            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-sm-3 col-6">
            <div class="card">
              <img class="card-img-top" src="{!! asset('public/frontend/images/vietcombank.png') !!}" alt="Vietcombank" style="width:100%">
              <div class="card-body">
                NGUYEN NGOC TIENG<br>
                STK: 0181 0007 63081 - Vietcombank Chi Nhánh Thủ Đức, TP.HCM
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-6">
            <div class="card">
              <img class="card-img-top" src="{!! asset('public/frontend/images/achau.png') !!}" alt="ACB" style="width:100%">
              <div class="card-body">
                NGUYEN NGOC TIENG<br>
                STK: 206842769 - ACB Chi Nhánh Thủ Đức, TP.HCM
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-6">
            <div class="card">
              <img class="card-img-top" src="{!! asset('public/frontend/images/donga.png') !!}" alt="DongAbank" style="width:100%">
              <div class="card-body">
                NGUYEN NGOC TIENG<br>
                STK: 0110170253 - DongAbank Chi Nhánh Thủ Đức, TP.HCM
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-6">
            <div class="card">
              <img class="card-img-top" src="{!! asset('public/frontend/images/agribank.png') !!}" alt="Ngân Hàng NN & PT Nông Thôn" style="width:100%">
              <div class="card-body">
                NGUYEN NGOC TIENG<br>
                STK: 1601 2050 82518 - Ngân Hàng NN & PT Nông Thôn Chi Nhánh Q1, TP.HCM
              </div>
            </div>
          </div>
      </div>
      <div class="col-lg-12">
        <a href="{!! url('trang-chu') !!}" class="btn btn-info" role="button"><i class="fas fa-cart-arrow-down"></i>
          Tiếp tục mua hàng</a>
      </div>
    </div>
    @else
      <div class="row">
        <div class="col-lg-12">
          <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Thông báo!</strong> <h6>Chưa có sản phẩm nào trong giỏ hàng!</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <a href="{!! url('trang-chu') !!}" class="btn btn-info" role="button"><i class="fas fa-cart-arrow-down"></i>
            Tiếp tục mua hàng</a>
        </div>
      </div>
    @endif
  </div>
  <!--End main-container -->
@endsection