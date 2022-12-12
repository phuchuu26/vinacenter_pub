@extends('admin.master')
@section('title','Danh sách')
@section('content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                    <a type="button" href="{{route('getVoucherAdd')}}" value="Thêm mới Option" class="btn btn-success">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo Voucher
                    </a>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="10"><h6>Danh sách Voucher</h6></th>
                    </tr>
                    <tr class="list_heading">
                        {{-- <th>STT</th> --}}
                        <th>Voucher</th>
                        <th>Số tiền giảm giá</th>
                        <th>Sản phẩm giảm giá</th>
                        <th>Thời gian tạo</th>
                        <th>Người tạo</th>
                        <th>Thời gian update</th>
                        <th class="action_col" colspan="2"></th>
                    </tr>
                    </thead>
                    @foreach($data as $item)
                        @php
                        $productOption = $item->productOption;
                        $user = $item->user;
                        // dd($product, $item);
                        @endphp

                        <tr class="list_data">
                            <td class="list_td aligncenter">{!! $item["code"] !!}</td>
                            <td class="list_td aligncenter">{!! number_format($item["amount_discount"]) .' đ'!!}</td>
                            <td class="list_td aligncenter">{!! data_get($productOption, 'name') !!}</td>
                            {{-- <td class="list_td aligncenter">{!! data_get($item, 'created_at') !!}</td> --}}
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                            </td>
                            <td class="list_td aligncenter">{!! data_get($user, 'username')!!}</td>
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() !!}
                            </td>

                            <td class="list_td aligncenter">
                                <a href="{!! route('getVoucherEdit',['id_voucher' => $item["id_voucher"]]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>&nbsp;&nbsp;&nbsp;

                            </td>
                            <td class="list_td aligncenter">
                                <a href="{!! route('getVoucherDelete',['id' => $item["id_voucher"]]) !!}"
                                onclick="return xacnhanxoa('Bạn thật sự muốn xóa danh mục này?')">
                                    <img src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-lg-12">
                <div id="paging_nav">{{ $data->render() }}</div>
            </div>
        </div>
    </div>
@endsection