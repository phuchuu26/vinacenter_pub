@extends('admin.master')
@section('title','Thêm loại')
@section('content')
    <form action="{{ route('postCateAdd') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Category
                        </header>
                        <div class="panel-body mt-4">
                            <div class="position-center">

                                <div class="form-group mb-3">
                                    <select name="sltCate" class="form-control">
                                        <option value="0">--- ROOT ---</option>
                                        <?php menuMulti($dataCate, 0, $str = "---|", old('sltCate'));?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tên Loại</span>
                                    </div>
                                    <input type="text" class="form-control" name="txtCateName" id="txtCateName" required>
                                </div>
                                <div class="input-group mb-3">
                                    <label>
                                        <input type="radio" name="rdoPublic" id="optionsRadios1" value="1" checked="">
                                        active
                                    </label>
                                    <label class="pl-2">
                                        <input type="radio" name="rdoPublic" id="optionsRadios2" value="0">
                                        not active
                                    </label>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>
@endsection