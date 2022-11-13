@extends('admin.master')
@section('title','Dịch vụ')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <legend>Dịch vụ</legend>
                    <span class="form_label">Nội dung:</span>
                    <span class="form_item">
			<textarea name="txtFull" rows="200" class="textbox">
			{!! old('txtFull',isset($service["content"]) ? $service["content"] : null) !!}
			</textarea>
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
                        ['Table'],
                        ['Image', 'Flash', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
                        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']
                    ]
                });
			</script>
		</span><br/>
                    @if(Auth::user()->role==1)
                        <span class="form_label"></span>
                        <span class="form_item">
			<input type="submit" name="btnNewsEdit" value="Cập nhật" class="btn btn-success pull-right"/>
		</span>
                    @endif
                </fieldset>
            </form>
        </div>
    </div>
@endsection