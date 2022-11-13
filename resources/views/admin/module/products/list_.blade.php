@extends('admin.master')
@section('title','Danh sách Sản phẩm')
@section('content')
    <div class="table-agile-info p-2">
        <div style="padding-bottom: 10px">
            <a href="{!! route('getProductAdd') !!}">
                <button type="button" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo
                </button>
            </a>
        </div>
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <tr class="list_heading">
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Options</th>
                    <th>Thời Gian</th>
                    <th>Người đăng</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <?php $produc_id = ""; ?>
                @foreach($product as $item)
                    <?php $produc_id = $item['id']; ?>
                    <tr class="list_data">
                        <td class="align-middle text-body">{!! str_limit($item["title"], $limit = 40, $end = '...') !!}
                            @if($item['is_hot'] == 1)
                                <sup id="is_hot" class="is_hot">hot</sup>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="{!! route('getProductImagetList',['id' => $item["id"]]) !!}">
                                <button type="button" class="btn btn-success"><i class="fa fa-picture-o"
                                                                                 aria-hidden="true"></i></button>
                            </a>
                        </td>
                        <td class="align-middle">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_id" value="{!! $item["id"] !!}"/>
                                <span class="form_item">
                               <a href="{{route("getProductOptionList",$item["id"])}}">
                                <button type="button" class="btn btn-success">Xem</button>
                                </a>
                                <a href="{!! route('getProductOptionAdd',['id' => $item["id"]]) !!}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo
                                    </button>
                                </a>
                            </span>
                            </form>
                        </td>
                        <td class="align-middle text-body">
                            {!! $item["created_at"] !!}
                        </td>
                        <td class="align-middle text-body">{!! $item['user_id'] !!}</td>
                        <td class="align-middle">
                            <a href="{!! route('getProductEdit',['id' => $item["id"]]) !!}"><img
                                        src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>&nbsp;&nbsp;&nbsp;

                        </td>
                        <td class="align-middle">

                            <a href="{!! route('getProductDelete',['id' => $item["id"]]) !!}"
                               onclick="return xacnhanxoa('Bạn thật sự muốn xóa danh mục này?')"><img
                                        src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div id="paging_nav">{{ $product->render() }}</div>
    </div>
@endsection