@extends('admin.master')
@section('title','Trang Intro')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <table class="table">
                <tr class="list_heading">
                    <td>Tiêu Đề</td>
                    <td class="action_col">Quản lý?</td>
                </tr>
                @foreach($data as $item)
                    <tr class="list_data">
                        <td class="list_td aligncenter">{!! $item["code"] !!}</td>
                        <td class="list_td aligncenter">
                            @if(Auth::user()->role==1)
                                <a href="{!! route('getStaticsEdit',['id' => $item["id"]]) !!}"><img
                                            src="{!! asset('/public/vnc_admin/images/edit.png') !!}"/></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection