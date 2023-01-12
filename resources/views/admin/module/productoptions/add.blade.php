@extends('admin.master')
@section('title','Thêm Options')
@section('content')
    <div class="form-w3layouts">
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h6>Thêm mới Sản phẩm thuộc : {!! $product['title'] !!}</h6>
                    <input type="hidden" name="category_alias" value="{!! $product["category_alias"] !!}"/>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Tên Sản phẩm</span>
                        </div>
                        <input type="text" name="txtName" class="form-control" value="{!! old('txtName') !!}" required/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Giá dealer</span>
                        </div>
                        <input type="text" name="txtdealer" class="form-control" value="{!! old('txtdealer') !!}" required/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Giá web</span>
                        </div>
                        <input type="text" name="txtValue" class="form-control" value="{!! old('txtValue') !!}" required/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Số lượng</span>
                        </div>
                        <input type="number" name="txtamount" class="form-control" value="{!! old('txtamount') !!}" required/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 250px">Thời gian Bảo hành</span>
                        </div>
                        <input type="number" name="txtwarranty" class="form-control" value="{!! old('txtamount') !!}" required/> (tháng) 
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Vị trí</span>
                        </div>
                        <input type="text" name="txtindextop" class="form-control" value="{!! old('txtindextop') !!}"/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Voucher Code</span>
                        </div>
                        <input type="text" name="code" class="form-control" value="{!! old('code') !!}"/>
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Số tiền giảm giá</span>
                        </div>
                        <input type="number" name="amount_discount" class="form-control" value="{!! old('amount_discount') !!}"/>
                    </div>
                </div>


                <div class="col-lg-12">Mô tả</div>
                <div class="col-lg-12">
                    <textarea name="txtIntro" rows="10" class="form-control">{!! old('txtIntro') !!}</textarea>
                </div>
                <div class="col-lg-12 mt-2">Thông tin Khuyến mãi</div>
                <div class="col-lg-12 mb-4">
                    <textarea name="txtsaleoff" rows="10" class="form-control">{!! old('txtsaleoff') !!}</textarea>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Chọn hình đại diện</span>
                        </div>
                        <select name="sltImg" class="form-control">
                            @foreach($productImg as $item)
                                <option value="{!! $item['path'] !!}">{!! $item['path'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Thuộc lọai sản phẩm</span>
                        </div>
                        <select name="sltSales" class="form-control">
                            @foreach($productType as $item)
                                <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Thuộc bộ sưu tập</span>
                        </div>
                        <select name="sltCollect" class="form-control">
                            @foreach($productCollection as $item)
                                <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <button type="submit" name="btnProAdd" class="btn btn-success pull-right">Thêm</button>
                </div>
            </div>

            <script type="text/javascript">
                var editor = CKEDITOR.replace('txtIntro', {
                    language: 'vi',
                    filebrowserImageBrowseUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    toolbar: [
                        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
                        ['FontSize', 'TextColor', 'BGColor', 'Smiley'],
                        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-'],
                        ['Table'],
                    ]
                });
            </script>
            <script type="text/javascript">
                var editor = CKEDITOR.replace('txtsaleoff', {
                    language: 'vi',
                    filebrowserImageBrowseUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    toolbar: [
                        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
                        ['FontSize', 'TextColor', 'BGColor', 'Smiley'],
                        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-'],
                    ]
                });
            </script>
        </form>
    </div>
@endsection