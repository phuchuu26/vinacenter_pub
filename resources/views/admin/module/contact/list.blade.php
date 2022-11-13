@extends('admin.master')
@section('title','Danh sách đơn hàng')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default mt-5">
            <table class="table">
                <tr class="list_heading">
                    <td>Người gửi</td>
                    <td>Email</td>
                    <td>Nội dung</td>
                    <td>Thời gian</td>
                    <td>Trạng thái</td>
                    <td class="action_col" colspan="2">Quản lý?</td>
                </tr>
                @foreach($data as $item)
                <tr class="list_data">
                    <td class="list_td aligncenter">{!! $item["name"] !!}</td>
                    <td class="list_td aligncenter">{!! $item["email"] !!}</td>
                    <td class="list_td aligncenter">{!! str_limit($item["content"], $limit = 50, $end = '...') !!}</td>
                    <td class="list_td aligncenter">
                    <?php \Carbon\Carbon::setLocale('vi'); ?>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}
                    </td>
                    <td>
                        @if ($item["status"] == 0)
                            <span style="color: red;">Đang chờ</span>
                        @endif
                        @if ($item["status"] == 1)
                            <span style="color: blue;">Đã xem</span>
                        @endif
                    </td>
                    <td class="list_td aligncenter">
                        <a href="{!! route('getContactView',['id' => $item["id"]]) !!}" title="Xem"><img src="{!! asset('/public/vnc_admin/images/edit-3.png') !!}" /></a>&nbsp;&nbsp;&nbsp;

                    </td>
                    <td class="list_td aligncenter">

                        @if(Auth::user()->role==1)
                            <a href="{!! route('getContactDelete',['id' => $item["id"]]) !!}" onclick="return xacnhanxoa('Bạn thật sự muốn xóa tin nhắn này?')" title="Xóa"><img src="{!! asset('/public/vnc_admin/images/delete.png') !!}" /></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            <div id="paging_nav">{{ $data->render() }}</div>
        </div>
    </div>
@endsection