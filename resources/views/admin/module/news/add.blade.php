@extends('admin.master')
@section('title','Thêm tin tức')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="table-agile-info">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h5>Thêm mới tin tức</h5>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 200px">Chọn loại</span>
                        </div>
                        <select name="sltype" class="form-control">
                            <option value="0">Tin tức</option>
                            <option value="1">Dịch vụ</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="usr">Tiêu đề tin</label>
                        <textarea name="txtIntro" rows="5" class="form-control">{!! old('txtIntro') !!}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="usr">Nội dung tin</label>
                        <textarea name="txtFull" rows="20" class="form-control">{!! old('txtFull') !!}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                            <label>Hình đại diện</label>

                        <input type="file" name="newsImg" id="inputGroupFile01" class="form-control-file border"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="rdoPublic" value="1" checked="checked"
                                       @if (old('rdoPublic') == "1")
                                       checked
                                        @endif
                                /> Active
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="rdoPublic" value="0"
                                       @if (old('rdoPublic') == "0")
                                       checked
                                        @endif
                                />No Active
                            </label>
                        </div
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" name="btnNewsAdd"  class="btn btn-success" >Thêm</button>
            </div>
            <script type="text/javascript">
                var editor = CKEDITOR.replace('txtFull', {
                    language: 'vi',
                    filebrowserImageBrowseUrl: '../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl: '../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl: '../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    toolbar: [
                        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
                        ['FontSize', 'TextColor', 'BGColor'],
                        ['Image', 'Flash', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'],

                    ]
                });
            </script>
        </div>
    </form>
@endsection