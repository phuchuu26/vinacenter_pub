@extends('admin.master')
@section('title','Thêm loại')
@section('content')
    <form action="" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm màu sắc
                        </header>
                        <div class="panel-body mt-4">
                            <div class="position-center">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tên màu sắc</span>
                                    </div>
                                    <input type="text" class="form-control" name="name_color" id="name_color" required>
                                </div>

                              
                                <div align="center" class="position-center">
                                    <button type="submit" class="btn btn-info">Thêm màu sắc</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
        });

    </script>
@endsection