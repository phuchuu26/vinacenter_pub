@extends('admin.master')
@section('title','Danh sách')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <table class="table">
                <tr class="list_heading">
                    <td>Tiêu Đề</td>
                    <td>Hình ảnh</td>
                    <td>Kích thước</td>
                    <td class="action_col">Quản lý?</td>
                </tr>
                @foreach($data as $item)
                    <tr class="list_data">
                        <td class="list_td aligncenter">{!! $item["name"] !!}</td>
                        <td class="list_td aligncenter">
                            <img src="{!! isset($item["path"]) ? asset('public/uploads/banner/'.$item["path"]) : asset('public/vnc_admin/templates/images/nophoto.png') !!}"
                                 width="100px"/>
                        </td>
                        <td class="list_td aligncenter">{!! $item["size"] !!}</td>
                        <td class="list_td aligncenter">
                            @if(Auth::user()->role==1)
                                <a href="{!! route('getImageEdit',['id' => $item["id"]]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection