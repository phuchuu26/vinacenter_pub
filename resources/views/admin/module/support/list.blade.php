@extends('admin.master')
@section('title','Danh sách')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <table class="table">
                <tr class="list_heading">
                    <td>Tiêu Đề</td>
                    <td>Content</td>
                    <td>Loại</td>
                    <td class="action_col">Quản lý?</td>
                </tr>
                @foreach($data as $item)
                    <tr class="list_data">
                        <td class="list_td aligncenter">{!! $item["name"] !!}</td>
                        <td class="list_td aligncenter">{!! $item["value"] !!}</td>
                        <td class="list_td aligncenter">{!! $item["type_name"] !!}</td>
                        <td class="list_td aligncenter">
                            @if(Auth::user()->role==1)
                                <a href="{!! route('getSupportEdit',['id' => $item["id"]]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>&nbsp;&nbsp;
                                &nbsp;
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection