@extends('admin.master')
@section('title','Chi tiết đơn hàng')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default mt-5">
            <table class="table">
    <tbody>
        <tr class="cus_det">
            <td width="15%"><span>Người gửi</span></td>
            <td>{!! $contact['name'] !!}</td>            
        </tr>
        <tr class="cus_det">            
            <td width="15%"><span>Email</span></td>
            <td>{!! $contact['email'] !!}</td>
        </tr>        
        <tr class="cus_det">
            <td width="15%"><span>Ngày gửi</span></td>
            <td>{!! $contact['created_at'] !!}</td>
        </tr>
        <tr class="cus_det">
            <td width="15%"><span>Nội dung</span></td>
            <td>{!! $contact['content'] !!}</td>
        </tr>
        @if(Auth::user()->role==1)
        <tr class="cus_det">
            <td colspan="2">
                <a href="{!! route('getContactDelete',['id' => $contact["id"]]) !!}">
                    <button type="button"  name="btnNewsAdd" class="btn btn-success">Xóa</button>
                </a>
            </td>
        </tr>
        @endif
    </tbody>
</table>
        </div>
    </div>
@endsection