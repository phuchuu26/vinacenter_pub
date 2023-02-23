@extends('admin.master')
@section('title','Danh sách đơn hàng')
@section('content')
    <style type="text/css">
        a {
            cursor: pointer;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h6>Tổng tiền chiếc khấu <span class="badge badge-secondary">{{number_format($total_bonus)}} VNĐ</span></h6>
        </div>

        <div class="col-lg-12 mb-4">
            <h6>Tổng tiền ship <span class="badge badge-danger">{{number_format($total_fee)}} VNĐ</span></h6>
        </div>
      

        <div class="col-lg-12 mb-4">
            <h6>Tổng tiền chiếc khấu đã trừ ship <span class="badge badge-info">
          {{number_format($total_bonus - $total_fee)}} VNĐ
        </span></h6>
        </div>

        {{-- <div class="col-lg-12">
            <form action="{!! route('postUpdateBonus') !!}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-12">
                    <input type="hidden" name="from" value="{{Request('from')}}">
                    <input type="hidden" name="to" value="{{Request('to')}}">
                    <input type="hidden" name="username" value="{{Request('username')}}">
                    <button type="submit" class="btn btn-success pull-right">Hoàn tất</button>
                </div>
            </form>
        </div>
         --}}
        <div class="col-lg-12">
            <table>
                <tr>
                    <form action="" method="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Từ</span>
                                </div>
                                <input type="date" class="form-control" name="from" id="from"
                                       value="{{ Request::get('from') }}">
                            </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Đến</span>
                                </div>
                                <input type="date" class="form-control" name="to" id="to"
                                       value="{{ Request::get('to') }}">
                            </div>
                        </td>
                        @if(Auth::user()->role > 0)
                            <td>
                                <div class="form-group">
                                    <select class="form-control" id="username" name="username">
                                        @foreach($users as $user)
                                            <option value="{{ $user->username }}"
                                                    @if(Request::get('username') == $user->username)
                                                    selected
                                                    @endif
                                            >{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        @endif
                        <td>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-filter" aria-hidden="true"></i> Lọc
                                </button>
                            </div>
                        </td>
                    </form>

                    <td>

                        <div style="margin-top: -16px;" class="form-group complete">
                            <form action="{!! route('postUpdateBonus') !!}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-lg-12">
                                    <input type="hidden" name="from" value="{{Request('from')}}">
                                    <input type="hidden" name="to" value="{{Request('to')}}">
                                    <input type="hidden" name="username" value="{{Request('username')}}">
                                    <button type="submit" class="btn btn-success pull-right">Hoàn tất</button>
                                </div>
                            </form>
                        </div>

                    </td>
                        
                </tr>
            </table>
        </div>
    </div>
    <div id="accordion">
        @if(count($data1) >0)
            @foreach($data1 as $key => $item)
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-2">
                                <a class="card-link" data-toggle="collapse" href="#collapse{{$key}}">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i> {!! $item->fullname !!}
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <i class="fa fa-map-marker"
                                   aria-hidden="true"></i> {!! str_limit($item->address, $limit = 25, $end = '...') !!}
                            </div>
                            <div class="col-lg-2">
                                <i class="fa fa-phone-square" aria-hidden="true"></i> {!! $item->phone !!}
                            </div>
                            <div class="col-lg-2">
                                <i class="fa fa-user" aria-hidden="true"></i> {!! $item->user_id !!}
                            </div>
                            <div class="col-lg-3">
                                <i class="fa fa-calendar" aria-hidden="true"></i> {!! $item->created_at !!}
                                @if($item->status == 0)
                                    <span class="badge"
                                          style="background-color: red;color: white">Chưa giải quyết</span>
                                @else
                                    <span class="badge" style="background-color: blue;color: white">Đã xong</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="collapse{{$key}}" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table mb-1 text-body">
                                <tr>
                                    <td colspan="10">
                                        <div class="row bg-light text-dark mb-2">
                                            <div class="col-lg-3">
                                                Tên sp
                                            </div>
                                            <div class="col-lg-1">
                                                Giá dealer
                                            </div>
                                            <div class="col-lg-1">
                                                Giá web
                                            </div>
                                            <div class="col-lg-1">
                                                Giá sale
                                            </div>
                                            <div class="col-lg-1">
                                                Số lượng
                                            </div>
                                            <div class="col-lg-1">
                                                Thành tiền
                                            </div>
                                            <div class="col-lg-2">
                                                Chiếc khấu
                                            </div>
                                            <div class="col-lg-2">
                                                Bảo hành
                                            </div>
                                        </div>

                                        @foreach($item->details as $key => $detail)
                                            <?php
                                            $price_ = $detail->real_price > 0 ? $detail->real_price : $detail->price;
                                            ?>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    {!! $detail->product_name !!}
                                                </div>
                                                <div class="col-lg-1">
                                                    {!! number_format($detail->dealer) !!}
                                                </div>
                                                <div class="col-lg-1">
                                                    {!! number_format($detail->price) !!}
                                                </div>
                                                <div class="col-lg-1">
                                                    {!! number_format($detail->real_price) !!}
                                                </div>

                                                <div class="col-lg-1">
                                                    {!! $detail->qty !!}
                                                </div>
                                                <div class="col-lg-1">
                                                    {!! number_format($detail->qty * $price_) !!}
                                                </div>
                                                <div class="col-lg-2">
                           <span class="badge badge-success">
                            {{number_format($detail->qty*($price_ - $detail->dealer ) + $detail->discount )}}
                             {{-- {{number_format($detail->qty*($price_ - $detail->dealer))}} --}}
                           </span>
                                                </div>
                                                <div class="col-lg-2">
                                                    {!! number_format($detail->warranty) !!} tháng
                                                </div>
                                            </div>

                                        @endforeach

                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-lg-4">
                                    <h6>Tổng tiền đơn hàng <span class="badge badge-info">{!! number_format($item->totals) !!} VNĐ</span>
                                    </h6>
                                </div>
                                <div class="col-lg-3">
                                    <h6>Phí ship
                                        <span class="badge badge-info">
                                            {!! number_format($item->fee) !!} VNĐ
                                        </span>
                                        <span class="badge badge-success">
                      @if($item->express_human == 1)Shop trả @endif
                                            @if($item->express_human == 2)Sale trả @endif
                                            @if($item->express_human == 3)Khách trả @endif

                    </span>
                                    </h6>
                                </div>
                                <div class="col-lg-5">
                                    <h6>Chiếc khấu (đã trừ phí ship)
                                        <span class="badge badge-info">
                      @if($item->express_human == 3)
                                                {!! number_format($item->bonus) !!} VNĐ

                                            @else
                                                {!! number_format($item->bonus - $item->fee) !!} VNĐ
                                            @endif
                    </span>

                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection