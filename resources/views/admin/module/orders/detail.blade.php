@extends('admin.master')
@section('title','Chi tiết đơn hàng')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="col-lg-12">
                {{-- <p>Check out <a href="https://www.freecodecamp.org/" target="_blank" rel="noopener noreferrer">freeCodeCamp</a>.</p> --}}

                <a   target="_blank" style="float:right"  href="{{route('export_pdf', ['order_id' => $order_id])}}"  class="btn btn-info">
                    Xuất phiếu thu
                </a>
            </div>
            <table class="table">
                <tbody>
                <tr class="cus_det">
                    <td width="25%"><span>Họ & tên khách hàng:</span></td>
                    <td>{!! $customer->fullname !!}</td>
                    <td width="15%"><span>Số điện thoại:</span></td>
                    <td>{!! $customer->phone !!}</td>
                </tr>
                <tr class="cus_det">
                    <td width="15%"><span>Địa chỉ liên hệ:</span></td>
                    <td>{!! $customer->address !!}</td>
                    <td width="15%"><span>Email:</span></td>
                    <td>{!! $customer->email !!}</td>
                </tr>
                <tr class="cus_det">
                    <td width="15%"><span>Hình thức thanh toán:</span></td>
                    <td colspan="3" class="h6">
                        @if($customer->payment == 1)
                        Thanh toán khi nhận hàng: TM | Cod.
                        @else
                        Chuyển khoản (Internet Banking | Momo)
                        @endif
                    </td>
                </tr>
                <tr class="cus_det">
                    <td width="15%"><span>Mã thanh toán:</span></td>
                    <td >{!! $customer->payment_id !!}</td>
                    <td><span>Mã vận đơn:</span></td>
                    <td ><span class="badge badge-warning">{!! $customer->lading_code !!}</span></td>
                </tr>
                <tr class="cus_det">
                    <td width="15%"><span>Địa chỉ gửi hàng:</span></td>
                    <td colspan="3">{!! $customer->sendby !!}</td>
                </tr>
                <tr class="cus_det">
                    <td width="15%"><span>Yêu cầu khác:</span></td>
                    <td colspan="3">{!! $customer->note !!}</td>
                </tr>
                <tr class="cus_det">
                    <td width="15%"><span>Người bán:</span></td>
                    <form action="{{route('UpdateUser',$order_id)}}" method="POST">
                        <td>
                            <div class="row">
                                <div class="col-lg-6 m-0 p-0">
                                    @if(Auth::user()->role==1)
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <select class="form-control" id="txtUser" name="txtUser">
                                                @foreach($user as $item)
                                                    @if($item['username'] == $customer->user_id )
                                                        <option value="{!! $item['username']!!}"
                                                                selected="">{!! $item['name']!!}</option>
                                                    @else
                                                        <option value="{!! $item['username']!!}">{!! $item['name']!!}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        {!! $customer->user_id !!}
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <input type="submit" value="Cập nhật người bán" class="btn btn-success"/>
                                </div>
                            </div>
                        </td>
                    </form>
                    <td colspan="3">
                        @if($customer->status == 1)
                            <span style="color: blue">(Đơn hàng đã xong)</span>
                        @else
                            <span style="color: red">(Đơn hàng chưa giải quyết)</span>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table bg-light" >
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
                            @foreach($data as $key => $detail)
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
                                            {{number_format($detail->qty*($price_ - $detail->dealer ) + $detail->discount )}}
                                        </span>
                                        {{-- {{dd($detail, $price_ , $detail->dealer, $price_ - $detail->dealer)}} --}}

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
                                            @if($customer->express_human ==3)
                                                Khách trả phí
                                            @elseif($customer->express_human ==2)
                                                Sale trả phí
                                            @else
                                                Shop trả phí
                                            @endif
                                        </div>
                                        <div class="col-lg-4">
                                            {!! number_format($customer->fee) !!}
                                        </div>
                                    </div>
                                </td>
                                <td colspan="4" class="text-center font-weight-bold"></td>
                                <td colspan="1" class="text-left font-weight-bold">Tổng cộng</td>
                                {{-- <td></td> --}}

                                <td>{!! number_format($customer->prices) !!}</td>
                                <td colspan="2">{!! number_format($customer->bon) !!}</td>

                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-8 font-weight-bold">
                                            Chiếc khấu sau cùng
                                        </div>
                                        <div class="col-lg-4">
                                            @if($customer->express_human ==2)
                                                {!! number_format($customer->bon - $customer->fee) !!}
                                            @else
                                                {!! number_format($customer->bon) !!}
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td colspan="4" class="text-center font-weight-bold">- </td>
                                <td colspan="1" class="text-left font-weight-bold">- Đã thanh toán</td>
                                {{-- <td></td> --}}
                                <td colspan="3">
                                    {!! isset($customer->deposit) ? number_format($customer->deposit) : number_format($customer->depo) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-4 font-weight-bold">
                                            Mã vận đơn
                                        </div>
                                        <div class="col-lg-8">
                                            {{$customer->lading_code}}
                                        </div>
                                    </div>
                                </td>
                                <td colspan="2" class="text-center font-weight-bold"></td>
                                <td colspan="1" class="text-left font-weight-bold">Loại thanh toán</td>
                                {{-- <td></td> --}}
                                <td>{{$customer->pay_type}}</td>
                                <td class="font-weight-bold">Thành tiền</td>
                                <td colspan="2">
                                    {!! isset($customer->deposit) ? number_format($customer->prices - $customer->deposit) : number_format($customer->prices - $customer->depo) !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="table">
                @if(Auth::user()->role==1)
                    <tr class="cus_det">
                        <form method="POST" action="{{ route('getOrderUpdate',$customer->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td colspan="10">
                                <div class="row">
                                    <div class="col-lg-3">
                                        Loại thanh Toán : <input type="text" name="pay_type" value="{!! isset($customer->pay_type) ? $customer->pay_type : null !!}"
                                                                  class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        Phí gửi hàng : <input class="form-control" type="number" name="fee" value="{!! isset($customer->fee) ? $customer->fee : null !!}"
                                        >
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="express_human">Người trả phí:</label>
                                            <select class="form-control" id="express_human" name="express_human">
                                                <option value="1" @if(isset($customer->express_human) && $customer->express_human == 1) selected @endif >Shop trả phí</option>
                                                <option value="2" @if(isset($customer->express_human) && $customer->express_human == 2) selected @endif>Sale trả phí</option>
                                                <option value="3" @if(isset($customer->express_human) && $customer->express_human == 3) selected @endif>Khách trả phí</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        Mã vận đơn:
                                        <input  value="{!! isset($customer->lading_code) ? $customer->lading_code : null !!}" type="text" name="lading_code" class="form-control">
                                    </div>
                                    <div class="col-lg-12">
                                        <hr></div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="comment">Ghi chú:</label>
                                            <textarea name="note_by" id="note_by" class="form-control" rows="3" placeholder="Ghi chú">{!! $customer->note_by !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="order_id" value="{{$order_id}}">
                                        <input type="submit" value="Cập nhật đơn hàng"
                                               class="btn btn-info"/>
                                        <a href="{!! route('getOrderComplete',['id' => $customer->id]) !!}" class="btn btn-success pull-right">
                                            Click để Hoàn tất
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </form>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection