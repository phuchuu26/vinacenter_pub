@extends('admin.master')
@section('title','Thêm Sản phẩm')
@section('content')
    <div class="form-w3layouts">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                
                @if (\Auth::user()->role == 1)
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Loại Sản phẩm</span>
                            </div>
                                <select name="sltCate" class="form-control" required>
                                    <option value="">--- ROOT ---</option>
                                    <?php menuMulti($dataCate, 0, $str = "", old('sltCate'));?>
                                </select>
                        </div>
                    </div>
                @else
                    <input hidden name="sltCate" value="{{data_get($cate_diendan, 'id')}}">
                @endif
                    

                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên Sản phẩm</span>
                        </div>
                        <input type="text" name="txtName" class="form-control" value="{!! old('txtName') !!}" required/>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoHot" value="1" checked="checked"
                                   @if (old('rdoHot') == "1")
                                   checked
                                    @endif
                            /> SP Hot
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoHot" value="0"
                                   @if (old('rdoHot') == "0")
                                   checked
                                    @endif
                            /> SP không
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea id="txtFull" name="txtFull" rows="20" class="form-control">{!! old('txtFull') !!}</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-2">Hình ảnh</div>
                        <div class="col-lg-7">
                            <input class="form-control-file border" type="file" name="file[]" multiple>
                        </div>
                        <div class="col-lg-3">(Kích thước 500x500 là tốt nhất)</div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoPublic" value="1" checked="checked"
                                   @if (old('rdoPublic') == "1")
                                   checked
                                    @endif
                            /> Active
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoPublic" value="0"
                                   @if (old('rdoPublic') == "0")
                                   checked
                                    @endif
                            /> Not Active
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Tạo</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        tinymce.init({
            selector: '#txtFull',
            convert_urls: false,
            statusbar: false,

            plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo | image code| link fontsizeselect  | ',

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{url("/admin/upload")}}',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                };
                input.click();
            }
        });
    </script>
@endsection