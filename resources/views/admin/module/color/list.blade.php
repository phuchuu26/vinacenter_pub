@extends('admin.master')
@section('title','Danh sách')
@section('content')
<style>
    img.colorpick-eyedropper-input-trigger {
    display: none;
}
</style>
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                    <a type="button" href="{{route('getColorAdd')}}" value="Thêm mới Option" class="btn btn-success">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo Màu sắc
                    </a>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="10"><h6>Danh sách Màu sắc</h6></th>
                    </tr>
                    <tr class="list_heading">
                        {{-- <th>STT</th> --}}
                        <th>Tên Màu sắc</th>
                        <th>Màu</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian update</th>
                        <th class="action_col" colspan="2"></th>
                    </tr>
                    </thead>
                    @foreach($data as $item)
                        @php
                        @endphp

                        <tr class="list_data">
                            <td class="list_td aligncenter">{!! $item["name_color"] !!}</td>
                            
                            <td class="list_td aligncenter">
                                <input type="color" id="favcolor" name="favcolor" disabled value="{!! $item["color_picker"] !!}"><br><br>    
                            </td>
                            
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                            </td>
                            <td class="list_td aligncenter">
                                <?php \Carbon\Carbon::setLocale('vi'); ?>
                                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["updated_at"]))->diffForHumans() !!}
                            </td>

                         
                            <td class="list_td aligncenter">
                                <a href="{!! route('getColorDelete',['id' => $item["id_color"]]) !!}"
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