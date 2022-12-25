@extends('admin.master')
@section('title','Danh sách')
@section('content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                    {{-- <a type="button" href="{{route('getMaintenanceCustomerAdd')}}" value="Thêm mới Option" class="btn btn-success">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo yêu cầu Bảo hành
                    </a> --}}
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="10"><h6>Danh sách yêu cầu Bảo hành</h6></th>
                    </tr>
                    <tr class="list_heading">
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        {{-- <th>Loại dịch vụ</th>  --}}
                        {{-- sua chua/ ve sinh may tinh --}}
                        <th>Tên sản phẩm</th>
                        {{-- <th>Tổng cộng</th> --}}
                        <th>Ngày nhận</th>
                        <th>Thời gian cập nhật</th>
                        <th class="action_col" colspan="2"></th>
                    </tr>
                    </thead>
                    @php
                        $stt = 0;
                        $service_type = config('config.service_type');
                    @endphp
                    @foreach($data as $item)
                        @php
                        $productOption = $item->productOption;
                        $user = $item->user;
                        // dd($product, $item);
                        $stt++;
                        @endphp

                        <tr class="list_data">
                            <td class="list_td aligncenter">{!!  $stt !!}</td>
                            <td class="list_td aligncenter">{!! $item["name_customer"] !!}</td>
                            <td class="list_td aligncenter">{!! $item["phone_customer"] !!}</td>
                            {{-- <td class="list_td aligncenter">{!! number_format($item["phone_customer"]) .' đ'!!}</td> --}}
                            {{-- <td class="list_td aligncenter">{!! data_get($service_type, (int)$item["service_type"]) !!}</td> --}}
                            <td class="list_td aligncenter">{!! data_get($item, "product_name") !!}</td>
                              {{-- <td class="list_td aligncenter">{!! number_format($item["total"]) .' đ'!!}</td> --}}
                            {{-- <td class="list_td aligncenter">{!! data_get($item, 'created_at') !!}</td> --}}
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                            </td>
                            {{-- <td class="list_td aligncenter">{!! data_get($user, 'username')!!}</td> --}}
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() !!}
                            </td>

                            <td class="list_td aligncenter">
                                <a href="{!! route('getMaintenanceCustomerEdit',['id_service_customer' => $item["id_service_customer"]]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>&nbsp;&nbsp;&nbsp;

                            </td>
                            <td class="list_td aligncenter">
                                <a href="{!! route('getMaintenanceCustomerDelete',['id' => $item["id_service_customer"]]) !!}"
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