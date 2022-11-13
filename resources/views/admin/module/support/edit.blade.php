@extends('admin.master')
@section('title','Cập nhật Support')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row m-2 p-2">
                    <div class="col-lg-12 mb-4">
                        <h5>Cập nhật thông tin {!! $data["name"] !!}</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Tên tiêu đề</span>
                            </div>
                            <input type="text" name="txtName" class="form-control"
                                   value="{!! old('txtName'), isset($data["name"]) ? $data['name'] : null !!}"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Nội dung</span>
                            </div>
                            <input type="text" name="txtContent" class="form-control"
                                   value="{!! old('txtContent'), isset($data["value"]) ? $data['value'] : null !!}"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" name="btnNewsEdit" class="btn btn-success pull-right">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection