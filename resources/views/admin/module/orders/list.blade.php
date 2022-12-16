@extends('admin.master')
@section('title','Danh sách đơn hàng')
@section('content')
  <style type="text/css">
    a {
      cursor: pointer;
    }
  </style>
  <div class="table-agile-info p-2">
    <div class="row">
      <div class="col-lg-12">
        @include('admin.module.orders.include.search')
      </div>
    </div>
    <div id="accordion">
      <div class="row">
        <div class="col-lg-6">
          @if($total>0)
            <ul class="list-group mb-0">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <h6>Tổng tiền chiết khấu</h6>
                <span class="badge badge-primary badge-pill">{{number_format($total)}} VND</span>
              </li>
            </ul>
          @endif
        </div>
        <div class="col-lg-12">
          <table class="table table-striped mb-1">
            <thead>
            <tr>
              <th width="20%">Khách hàng</th>
              <th width="20%">Địa chỉ</th>
              <th width="10%">Điện thoại</th>
              <th width="10%">Người bán</th>
              <th width="15%">Ngày đặt hàng</th>
              <th width="10%">Trạng thái</th>
              <th width="5%">Bonus</th>
              @if(Auth::user()->role==1)
                <th width="10%"></th>
              @endif
            </tr>
            </thead>
          </table>
          @foreach($data as $key => $item)
            <table class="table  mb-1 table-hover">
              <tbody>
              <tr>
                <td width="20%" data-toggle="collapse" href="#collapse{{$key}}">
                  <i class="fa fa-caret-right" aria-hidden="true"></i>
                  <a href="{!! route('viewOrder',['id' => $item->id]) !!}">
                    {!! $item->fullname !!}</a>
                </td>
                <td width="20%"
                    title="{{$item->address}}">{!! str_limit($item->address, $limit = 25, $end = '...') !!}</td>
                <td width="10%">{!! $item->phone !!}</td>
                <td width="10%">{!! $item->user_id !!}</td>
                <td width="15%">{!! $item->created_at !!}</td>
                <td width="10%">
                  @if($item->status == 0)
                    <span class="badge" style="background-color: red;color: white">Chưa giải quyết</span>
                  @else
                    <span class="badge" style="background-color: blue;color: white">Đã xong</span>
                  @endif
                </td>

                <td width="5%">
                  @if($item->bonus_flag == 1)
                    <input type="checkbox" checked disabled>
                  @else
                    <input type="checkbox" disabled>
                  @endif
                </td>
                @if(Auth::user()->role==1)
                  <td width="10%">
                    <a href="{!! route('getOrderDetail',['id' => $item->id]) !!}" title="Xem"><img
                              src="{!! asset('/public/vnc_admin/images/edit-3.png') !!}"/></a>&nbsp;&nbsp;&nbsp;

                    <a href="{!! route('getOrderDelete',['id' => $item->id]) !!}"
                       onclick="return xacnhanxoa('Bạn thật sự muốn xóa đơn hàng này?')"
                       title="Xóa"><img src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/></a>

                  </td>
                @endif
              </tr>
              </tbody>
            </table>
            <table id="collapse{{$key}}" class="table collapse bg-light" data-parent="#accordion">
              <tr>
                <td>
                  <table class="table">
                    <thead>
                    <tr class="bg-light">
                      <th>Tên sản phẩm</th>
                      <th>SL</th>
                      <th>Giá dealer</th>
                      <th>Giá web</th>
                      <th>Voucher Code</th>
                      <th>Giá sale</th>
                      <th>Thành tiền</th>
                      <th>Chiếc khấu</th>
                      <th>Bảo hành</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($item->details as $key => $detail)
                      <tr>
                          <?php
                          $price_ = $detail->real_price > 0 ? $detail->real_price : $detail->price;
                          ?>
                        <td>
                          {!! $detail->product_name !!}
                        </td>
                        <td>
                          {!! $detail->qty !!}
                        </td>
                        <td>
                          {!! number_format($detail->dealer) !!}
                        </td>
                        <td>
                          {!! number_format($detail->price) !!}
                        </td>


                          <td>
                            @if(!empty($detail->voucher_code))
                              {{$detail->code }} ( giảm   {!! number_format($detail->discount) !!} đ)
                            @endif
                          </td>

                       
                        <td>
                          {!! number_format($detail->real_price) !!}
                        </td>

                        <td>
                          {!! number_format($price_ * $detail->qty )!!}
                        </td>
                        <td>
                          <span class="badge badge-success">
                            
                            {{number_format($detail->qty*($price_ - $detail->dealer) + $detail->discount )}}
                          </span>
                        </td>
                        <td>
                          {!! number_format($detail->warranty) !!} tháng
                        </td>
                      </tr>
                    @endforeach
                    <tr>
                      <td>
                        <div class="row">
                          <div class="col-lg-8">
                            <span class="font-weight-bold">Phí vận chuyển:</span>
                            @if($item->express_human ==3)
                              Khách trả phí
                            @elseif($item->express_human ==2)
                              Sale trả phí
                            @else
                              Shop trả phí
                            @endif
                          </div>
                          <div class="col-lg-4">
                            {!! number_format($item->fee) !!}
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <td colspan="3" class="text-left font-weight-bold"></td>
                      <td colspan="" class="text-left font-weight-bold">Tổng cộng</td>

                      <td>{!! number_format($item->total) !!}</td>
                      <td colspan="2">{!! number_format($item->bon) !!}</td>

                    </tr>
                    <tr>
                      <td>
                        <div class="row">
                          <div class="col-lg-8 font-weight-bold">
                            Chiếc khấu sau cùng
                          </div>
                          <div class="col-lg-4">
                            @if($item->express_human ==2)
                              {!! number_format($item->bon - $item->fee) !!}
                            @else
                              {!! number_format($item->bon) !!}
                            @endif
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <td colspan="3" class="text-right font-weight-bold"></td>
                      <td colspan="1" class="text-left font-weight-bold">Đặt cọc</td>
                      <td colspan="3">
                        {!! isset($item->deposit) ? number_format($item->deposit) : number_format($item->depo) !!}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="row">
                          <div class="col-lg-4 font-weight-bold">
                            Mã vận đơn
                          </div>
                          <div class="col-lg-8">
                            {{$item->lading_code}}
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <td colspan="1" class="text-left font-weight-bold">Loại thanh toán</td>
                      <td>{{$item->pay_type}}</td>
                      <td class="font-weight-bold"></td>
                      <td class="font-weight-bold">Thành tiền</td>
                      <td colspan="3">
                        {!! isset($item->deposit) ? number_format($item->total - $item->deposit) : number_format($item->total - $item->depo) !!}
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </table>
          @endforeach
        </div>
        <div class="col-lg-12">
          <div class="">{{ $data->links() }}</div>
        </div>
      </div>
    </div>
  </div>
@endsection