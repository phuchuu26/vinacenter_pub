@extends('admin.master')
@section('title','Thêm User')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <form action="" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h5>Thông Tin User</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Họ tên</span>
                            </div>
                            <input type="text" name="txtUsername" class="form-control" value="{!! old('txtUsername') !!}" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Username</span>
                            </div>
                            <input type="text" name="txtUser" class="form-control" value="{!! old('txtUser') !!}" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Password</span>
                            </div>
                            <input type="password" name="txtPass" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Confirm password</span>
                            </div>
                            <input type="password" name="txtRepass" class="form-control" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Loại User</span>
                            </div>
                            <select name="txtRole" class="form-control">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="submit" name="btnUserAdd" value="Thêm User" class="btn btn-success pull-right"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection