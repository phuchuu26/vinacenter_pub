@extends('frontend.master')
@section('title',"Các sản phẩm đã được mua")
@section('content')
<style type="text/css">
  .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
    width:20%;
    display: inline !important;
  }
  .actions .btn{
    width:36%;
    margin:1.5em 0;
  }
  
  .actions .btn-info{
    float:left;
  }
  .actions .btn-danger{
    float:right;
  }
  
  table#cart thead { display: none; }
  table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
 
  table#cart tbody td:before {
    content: attr(data-th); font-weight: bold;
    display: inline-block; width: 8rem;
  }
  
  
  
  table#cart tfoot td{display:block; }
  table#cart tfoot td .btn{display:block;}
  
}
</style>
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
            <strong itemprop="title">Giỏ hàng</strong>
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
        <section class="col-main col-md-12 col-sm-12">
        @if (LoadStatics::getCartCount() > 0)
          <div class="container">
  <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:45%">Sản phẩm</th>
              <th style="width:10%">Giá</th>
              <th style="width:13%">Số lượng</th>
              <th style="width:22%" class="text-center">Thành tiền</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          <tbody>
          @foreach($content as $item)
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="{!! asset('public/uploads/products/'.$item->options->img) !!}" alt="..." class="img-responsive"/></div>
                  <div class="col-sm-10">
                    <h4 class="nomargin"><a  href="{!! url('san-pham/'.$item->options->alias) !!}">{!! $item->name !!} </a></h4>
                    <a  href="{!! url('san-pham/'.$item->options->alias) !!}"><p style="font-style: italic;">Chi tiết <i class="fas fa-angle-double-right"></i></p></a>
                  </div>
                </div>
              </td>
              <td data-th="Price">{!! number_format($item->price) !!}₫</td>
              <td data-th="Quantity">
                <input id="{!! $item->rowId !!}" name="{!! $item->rowId !!}" type="number" class="form-control text-center" value="{!! $item->qty !!}" size="1" maxlength="2">
              </td>

              {{-- <td data-th="Voucher">
                <input id="{!! $item->rowId !!}" name="{!! $item->rowId !!}" type="text" class="voucher-code form-control text-center" value="{!! $item->voucher ?? '' !!}" >
              </td> --}}

              <td data-th="Subtotal" class="text-center">{!! number_format($item->price*$item->qty) !!}₫</td>
              <td class="actions" data-th="">
                <a href="#" class="updatecart" id="{!! $item->rowId !!}">
                  <button class="btn btn-info btn-sm"><i class="fa fa-refresh" title="Cập nhật lại số lượng"></i></button>
                </a>
                <a href="{!! url('xoa-san-pham',['id'=> $item->rowId]) !!}" >
                  <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" title="Xóa"></i></button>
                </a>                
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr class="visible-xs">
              <td class="text-center"><strong>{!! LoadStatics::getCartTotal().'₫' !!}</strong></td>
            </tr>
            <tr>
              <td><a href="{!! url('trang-chu') !!}" class="btn btn-warning"><i class="fas fa-cart-arrow-down"></i> Tiếp tục mua hàng</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>{!! LoadStatics::getCartTotal().'₫' !!}</strong></td>
              <td><a href="{!! url('dat-hang') !!}" class="btn btn-success btn-block">Tiến hành đặt hàng <i class="fas fa-luggage-cart"></i></a></td>
            </tr>
          </tfoot>
        </table>
</div>
        @else
        <h1>Chưa có sản phẩm nào trong giỏ hàng!</h1>
        <a href="{!! url('trang-chu') !!}" class="btn btn-info" role="button"><i class="fas fa-cart-arrow-down"></i> Tiếp tục mua hàng</a>
        @endif
        </section>
        
        </form>
      </div>
    </div>
  </div>
  <!--End main-container -->
  @endsection