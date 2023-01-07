@extends('admin.master')
@section('title','Cập nhật Sản phẩm')
@section('content')
<style>
    .select2-selection__rendered {
          line-height: 38px !important;
      }
      .select2-container .select2-selection--single {
          height: 38px !important;
      }
      .select2-selection__arrow {
          height: 38px !important;
      }
</style>

    <div class="form-w3layouts">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Loại Sản phẩm</span>
                        </div>
                        @if (\Auth::user()->role == 1)
                            <select name="sltCate" class="form-control" required>
                                <option value="">--- ROOT ---</option>
                                <?php menuMulti($parent, 0, $str = "---|", $product['category_id']);?>
                            </select>
                        @else

                            <input readonly type="text" name="sltCate" class="form-control"
                            value="{!! $product->cate->name !!}" required/>

                        @endif
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

                {{-- <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div  class="input-group-prepend">
                            <span style="width: 127px" class="input-group-text">Phụ kiện</span>
                        </div>
                            <select name="id_accessory[]" id="id_accessory" class="form-control" >
                                @foreach ($accessory as $acc )
                                    <option select value="{{data_get($acc, 'id_accessory')}}">{{data_get($acc, 'name_accessory')}}</option>
                               @endforeach
                            </select>
                            <input type="text" value="{{$product["id_accessory"] ?? ''}}" id='id_accessory_json' hidden>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div  class="input-group-prepend">
                            <span style="width: 127px" class="input-group-text">Màu sắc</span>
                        </div>
                        <input type="text" value="{{$product["id_color"] ?? ''}}" id='id_color_json' hidden>

                            <select name="id_color[]" id="id_color" class="form-control" >
                                @foreach ($color as $co )
                                    <option value="{{data_get($co, 'id_color')}}">{{data_get($co, 'name_color')}}</option>
                               @endforeach
                            </select>
                    </div>
                </div> --}}


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

        // $(document).ready(function() {
        //         $("#id_accessory").select2({
        //             multiple: true,
        //             allowClear: false
        //         });   
        //         $("#id_color").select2({
        //             multiple: true,
        //             allowClear: false
        //         });

        //         var id_accessory_json = $('#id_accessory_json').val();
                
        //         // one clears the box content and the other clears the highlighting
        //         if(id_accessory_json == ''){
        //             var id_accessory = [];
        //         }else{
        //             var id_accessory = JSON.parse(id_accessory_json);

        //         }
        //         $('#id_accessory').val(id_accessory);
        //         $('#id_accessory').trigger('change');
        //         // $('.select2-selection__rendered').html();

                
             
        //         var id_color_json = $('#id_color_json').val();

        //         if(id_color_json == ''){
        //             var id_color = [];
        //         }else{
        //             var id_color = JSON.parse(id_color_json);

        //         }
            
        //         // one clears the box content and the other clears the highlighting
        //         $('#id_color').val(id_color);
        //         $('#id_color').trigger('change');
        //         // one clears the box content and the other clears the highlighting
        //         // $('.select2-selection__rendered').html('');
        // });
        
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