@extends('admin.master')
@section('title','Danh sách Sản phẩm')
@section('content')
    <div class="table-agile-info p-2">        
        <form action="" method="GET" enctype="multipart/form-data">
        <div class="row mt-2">
            <div class="col-lg-12">
                <span>Danh mục sản phẩm</span>
                <a href="{!! route('getProductAdd') !!}">
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo
                </button>
            </a></div>
            <div class="col-lg-12"><hr></div>
            
            <div class="col-lg-4 pl-3">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search" name="keyword" value="{{Request::get('keyword')}}">
                  <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Tìm kiếm</button>
                  </div>
                </div>
            </div>
            
        </div> </form>
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <tr class="list_heading">
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Options</th>
                    <th>Thời Gian</th>
                    <th>Người đăng</th>
                    <th>Trạng thái</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <?php $produc_id = ""; ?>
                @foreach($product as $item)
                    <?php $produc_id = $item['id']; ?>
                    <tr class="list_data">
                        <td class="align-middle text-body">{!! str_limit($item["name"], $limit = 40, $end = '...') !!}
                            {{-- @if($item['is_hot'] == 1)
                                <sup id="is_hot" class="is_hot">hot</sup>
                            @endif --}}
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

                        <td class="align-middle text-body">
                            <button type="button" class="btn btn-warning">Chờ xét duyệt</button>
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
        <div id="paging_nav">{{ $product->appends(request()->query())->render() }}</div>
    </div>
@endsection