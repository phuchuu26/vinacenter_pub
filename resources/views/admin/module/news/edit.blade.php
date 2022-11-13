@extends('admin.master')
@section('title','Cập nhật tin tức')
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="table-agile-info">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <label class="mb-2">Tiêu đề tin</label>
                    <textarea name="txtIntro" rows="4" class="form-control"
                              autofocus>{!! old('txtIntro',isset($news["title"]) ? $news["title"] : null) !!}</textarea>

                </div>
                <div class="col-lg-12 mb-4">
                    <label for="">Nội dung tin</label>
                    <textarea name="txtFull" rows="20" class="form-control">
				        {!! old('txtFull',isset($news["description"]) ? $news["description"] : null) !!}
			        </textarea>
                </div>
                <div class="col-lg-12 mb-2">
                    <span class="form_label">Hình hiện tại</span>
                    <span class="form_item">
			        <img src="{!! isset($news["image"]) ? asset('public/uploads/news/'.$news["image"]) : asset('public/vnc_admin/templates/images/nophoto.png') !!}"
                    width="100px"/>
			        <input type="hidden" name="fImageCurrent" value="{!! $news["image"] !!}"/>
		            </span>
                </div>
                <div class="col-lg-12 mb-2">

                    <input type="file" name="newsImg" class="form-control-file border"/>(Rộng:335px, Cao:200px)
                </div>
                <div class="col-lg-12 mb-2">
                    <input type="radio" name="rdoPublic" value="1"
                           @if ($news["is_active"] == 1)
                           checked
                            @endif
                    /> Active
                    <input type="radio" name="rdoPublic" value="0"
                           @if ($news["is_active"] == 0)
                           checked
                            @endif
                    /> No Active
                </div>
                <div class="col-lg-12 mb-2">
                    <button type="submit" name="btnNewsEdit" class="btn btn-success pull-right">Update</button>
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
                            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']
                        ]
                    });
                </script>
        </div>
    </form>
@endsection