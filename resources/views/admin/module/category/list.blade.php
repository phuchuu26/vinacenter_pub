@extends('admin.master')
@section('title','Danh sách')
@section('content')
    <div class="table-agile-info p-2">
        <div>
            <a href="{!! route('getCateAdd') !!}">
                <input type="button" name="btnNewsAdd" value="Thêm mới" class="btn btn-success"/>
            </a>
        </div>
        <div class="panel panel-default mt-2">
            <div class="panel-heading">
                Category
            </div>
            <div>
                <table class="table">
                    <?php listCate($data); ?>
                </table>
            </div>
        </div>
    </div>
@endsection