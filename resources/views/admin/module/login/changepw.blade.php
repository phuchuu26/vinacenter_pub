@extends('admin.master')
@section('title','Đổi mật khẩu')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="POST" enctype="multipart/form-data" style="width: 650px;" id="myform"
                          class="myform">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="form-group">
                                <label for="email">Mật khẩu cũ:</label>
                                <input type="password" class="form-control" id="password1" name="password1" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mật khẩu mới:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Nhập lại khẩu mới:</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary" id="save">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection