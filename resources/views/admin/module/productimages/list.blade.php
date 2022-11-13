@extends('admin.master')
@section('title','Danh sách Hình ảnh Sản phẩm')
@section('content')
    <div class="form-w3layouts">
        <div class="panel panel-default">
            <table class="table">
                <thead>
                <tr>
                <th colspan="10">Tên sản phẩm : <b>{!! $productName['title'] !!}</b></th>
                </tr>
                <tr class="list_heading">
                    <td>Hình ảnh sản phẩm</td>
                    <td>Tên hình ảnh sản phẩm</td>
                    <td>Thời Gian</td>
                    <td class="action_col">Quản lý?</td>
                </tr>
                </thead>
            @foreach($product as $item)
                <tboby>
                <tr class="list_data">
                    <td class="list_td aligncenter">
                        <img src="{!! isset($item["path"]) ? asset('public/uploads/products/'.$item["path"]) : asset('public/vnc_admin/templates/images/nophoto.png') !!}"
                             width="100px"/>
                    </td>
                    <td class="list_td aligncenter">
                        <b>{!! $item["path"] !!}</b>
                    </td>
                    <td class="list_td aligncenter">
                        <?php \Carbon\Carbon::setLocale('vi'); ?>
                        {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                    </td>
                    <td class="list_td aligncenter">
                        <a href="{!! route('getProductImageDelete',['id' => $item["id"]]) !!}"
                           onclick="return xacnhanxoa('Bạn thật sự muốn xóa danh mục này?')">
                            <img src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/>
                        </a>
                    </td>
                </tr>
                </tboby>
            @endforeach
        </table>
        <div id="paging_nav">{{ $product->render() }}</div>
        </div>
    </div>
@endsection