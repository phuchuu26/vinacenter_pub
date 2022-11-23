@extends('admin.master')
@section('title','Cập nhật Sản phẩm')
@section('content')
    <div class="form-w3layouts">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Loại Sản phẩm</span>
                        </div>
                        <select name="sltCate" class="form-control" required>
                            <option value="">--- ROOT ---</option>
                            <?php menuMulti($parent, 0, $str = "---|", $product['category_id']);?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên Sản phẩm</span>
                        </div>
                        <input type="text" name="txtName" class="form-control"
                               value="{!! old('txtName',isset($product["title"]) ? $product["title"] : null) !!}" required/>
                    </div>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoHot" value="1" checked="checked"
                                   @if ($product["is_hot"] == 1)
                                   checked
                                    @endif
                            /> SP Hot
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoHot" value="0"
                                   @if ($product["is_hot"] == 0)
                                   checked
                                    @endif
                            /> SP không
                        </label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea id="txtFull" name="txtFull" rows="20" class="form-control">
                            {!! old('txtFull',isset($product["description"]) ? $product["description"] : null) !!}
                        </textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Hình ảnh</span>
                        </div>
                        <div class="custom-file">
                            <input class="custom-file-input" type="file" name="file[]" multiple>(Kích thước 500x500 là tốt nhất)
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoPublic" value="1" checked="checked"
                                   @if ($product["is_active"] == 1)
                                   checked
                                    @endif
                            /> Active
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rdoPublic" value="0"
                                   @if ($product["is_active"] == 0)
                                   checked
                                    @endif
                            /> Not Active
                        </label>
                    </div>
                </div>
                @if(\Auth::user()->role == '1')
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Tạo</button>
                    </div>
                @endif
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