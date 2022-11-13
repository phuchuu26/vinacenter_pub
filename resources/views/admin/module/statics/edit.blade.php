@extends('admin.master')
@section('title','Cập nhật Statics')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="usr">Cập nhật thông tin {!! $data["code"] !!}</label>
                            <textarea name="txtFull" rows="8" class="textbox" style="width: 850px;height: 700px;">
                            {!! old('txtFull',isset($data["value"]) ? $data["value"] : null) !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if(Auth::user()->role==1)
                            <span class="form_label"></span>
                            <span class="form_item">
			        <input type="submit" name="btnIntroEdit" value="Cập nhật" class="btn btn-success pull-right"/>
		            </span>
                        @endif
                    </div>
                </div>
			    <script type="text/javascript">
                        var editor = CKEDITOR.replace('txtFull', {
                        language: 'vi',
                        filebrowserImageBrowseUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl: '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        toolbar: [
                            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
                            ['FontSize', 'TextColor', 'BGColor'],
                            ['Image', 'Flash', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'],

                        ]
                        });
			        </script>
            </form>
        </div>
    </div>
@endsection