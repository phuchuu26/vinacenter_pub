@extends('admin.master')
@section('title','Cập nhật User')
@section('content')
    <form action="{{route('postUserEdit', ['id' => $data["id"] ])}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h5>Thông Tin User</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Họ tên</span>
                            </div>
                            <input type="text" name="txtUsername" class="form-control" value="{!! $data['name'] !!}" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Username</span>
                            </div>
                            <input type="text" name="txtUser" class="form-control" value="{!! $data['username'] !!}" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Password</span>
                            </div>
                            <input type="password" name="txtPass" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Confirm password</span>
                            </div>
                            <input type="password" name="txtRepass" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Loại User</span>
                            </div>
                            <select name="txtRole" class="form-control">
                                {{-- @if($data['role'] ==0)
                                    <option value="0" selected>User</option>
                                    <option value="1">Admin</option>
                                @else --}}
                               
                                    @foreach ($roles as $key => $role )
                                    
                                        @if($key == data_get($data, 'role'))
                                            <option value="{{$key}}" selected>{{$role}}</option>
                                        @else
                                            <option value="{{$key}}" >{{$role}}</option>
                                        @endif
                                    @endforeach
                                {{-- @endif --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <a href="{!! route('getUserList') !!}">&nbsp;Bỏ qua</a>
                    </div>
                    <div class="col-lg-6">
                        <input type="submit" name="btnUserAdd" value="Cập nhật User" class="btn btn-success pull-right"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection