@extends('admin.master')
@section('title','Danh sách tin tức')
@section('content')
    <div class="table-agile-info">
        <a href="{!! route('getNewsAdd') !!}">
            <input type="button" name="btnNewsAdd" value="Thêm mới"
                                                     class="btn btn-success"/>
        </a>
        <table class="table table-hover">
            <thead>
            <tr class="list_heading">
                <th>Tiêu Đề</th>
                <th>Thời Gian</th>
                <th>Người đăng</th>
                <th class="action_col">Quản lý?</th>
            </tr>
            </thead>
            @foreach($news as $item)
                <tr class="list_data">
                    <td class="list_td aligncenter">{!! str_limit($item["title"], $limit = 70, $end = '...') !!}</td>
                    <td class="list_td aligncenter">
                        <?php \Carbon\Carbon::setLocale('vi'); ?>
                        {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                    </td>
                    <td class="list_td aligncenter">{!! $item["user_id"] !!}</td>
                    <td class="list_td aligncenter">
                        <a href="{!! route('getNewsEdit',['id' => $item["id"]]) !!}"><img
                                    src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>
                        <a href="{!! route('getNewsDelete',['id' => $item["id"]]) !!}"
                           onclick="return xacnhanxoa('Bạn thật sự muốn xóa danh mục này?')"><img
                                    src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div id="paging_nav">{{ $news->render() }}</div>
    </div>
@endsection