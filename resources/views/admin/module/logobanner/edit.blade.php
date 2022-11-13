@extends('admin.master')
@section('title','Cập nhật')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <h5>Cập nhật {!! $data["name"] !!}</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tiêu đề</span>
                            </div>
                            <input type="text" name="txtName" class="form-control"
                                   value="{!! old('txtName'), isset($data["name"]) ? $data['name'] : null !!}"/>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <img src="{!! isset($data["path"]) ? asset('public/uploads/banner/'.$data["path"]) : asset('public/vnc_admin/templates/images/nophoto.png') !!}"
                             width="250px"/>
                        <input type="hidden" name="fImageCurrent" value="{!! $data["path"] !!}"/>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <input type="file" name="newImg" class="form-control-file border"/> {!! $data["size"] !!}
                    </div>
                    <div class="col-lg-12">
                        <input type="submit" name="btnNewsEdit" value="Cập nhật" class="btn btn-success pull-right"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection