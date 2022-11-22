@extends('admin.master')
@section('title','Danh sách Option của Sản phẩm')
@section('content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <a href="{!! route('getProductOptionAdd',['id' => $productName["id"]]) !!}">
                    <button type="button" name="btnProAdd" value="Thêm mới Option" class="btn btn-success">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm
                    </button>
                </a>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="10"><h6>{!! $productName['title'] !!}</h6></th>
                    </tr>
                    <tr class="list_heading">
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá Dealer</th>
                        <th>Giá web</th>
                        <th>Thời Gian Bảo Hành</th>
                        <th>Ngày thêm</th>
                        <th class="action_col" colspan="2"></th>
                    </tr>
                    </thead>
                    @foreach($productOption as $item)
                        <tr class="list_data">
                            <td class="list_td aligncenter">{!! str_limit($item["name"], $limit = 50, $end = '...') !!}</td>
                            <td class="list_td aligncenter">{!! $item["amount"] !!}</td>
                            <td class="list_td aligncenter">{!! number_format($item["dealer"]) !!}</td>
                            <td class="list_td aligncenter">{!! number_format($item["value"]) !!}</td>
                            <td class="list_td aligncenter">{!! number_format($item["warranty"]).' tháng' !!}</td>
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                            </td>
                            <td class="list_td aligncenter">
                                <a href="{!! route('getProductOptionEdit',['id' => $item["id"],'pro_id' => $productName['id']]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>&nbsp;&nbsp;&nbsp;

                            </td>
                            <td class="list_td aligncenter">
                                <a href="{!! route('getProductOptionDelete',['id' => $item["id"]]) !!}"
                                   onclick="return xacnhanxoa('Bạn thật sự muốn xóa danh mục này?')">
                                    <img src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-lg-12">
                <div id="paging_nav">{{ $productOption->render() }}</div>
            </div>
        </div>
    </div>
@endsection