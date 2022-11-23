@extends('admin.master')
@section('title','Danh sách')
@section('content')
    <div class="table-agile-info">
        <div style="padding-bottom: 10px">
            @if(Auth::user()->role==1)
                <a href="{!! route('getUserAdd') !!}"><input type="button" name="btnNewsAdd" value="Thêm mới"
                                                             class="btn btn-success"/></a>
            @endif
        </div>
        <div class="panel panel-default">
            <table class="table table-hover">
                <thead>
                <tr class="list_heading">
                    <th>Username</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Loại</th>
                    <th>Ngày tạo</th>
                    <th class="action_col">Quản lý</th>
                </tr>
                </thead>

                @foreach($data as $item)
                @php
                    $info_user = $item->infoUser;
                @endphp
                    <tr class="list_data">
                        <td class="list_td aligncenter">{!! data_get($item, 'username')!!}</td>
                        <td class="list_td aligncenter">{!! data_get($item, 'name') !!}</td>
                        <td class="list_td aligncenter">{!! data_get($item, 'email') !!}</td>
                        <td class="list_td aligncenter">{!! data_get($info_user, 'str_phone', '') !!}</td>
                        <td class="list_td aligncenter">
                            {{-- @if($item['role'] ==1)
                                Admin
                            @else
                                User
                            @endif --}}
                            @foreach ($roles as $key => $role )
                                    
                                @if($key == data_get($item, 'role'))
                                    {{$role}}
                                @endif
                            @endforeach

                        </td>
                        <td class="list_td aligncenter">{!! $item['created_at'] !!}</td>

                        <td class="list_td aligncenter">
                            @if(Auth::user()->role==1)
                                <a href="{!! route('getUserEdit',['id' => $item["id"]]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>&nbsp;&nbsp;
                                &nbsp;
                                <a href="{!! route('getUserDelete',['id' => $item["id"]]) !!}"
                                   onclick="return xacnhanxoa('Bạn thật sự muốn xóa danh mục này?')"><img
                                            src="{!! asset('/public/vnc_admin/images/delete.png') !!}"/></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection