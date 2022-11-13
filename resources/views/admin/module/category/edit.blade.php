@extends('admin.master')
@section('title','Chỉnh sửa loại')
@section('content')
    <form action="{{ route('postCateEdit') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="cate_id" id="cate_id" value="{{$data['id']}}">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Category
                        </header>
                        <div class="panel-body mt-4">
                            <div class="position-center">

                                <div class="form-group mb-3">
                                    <select name="sltCate" class="form-control">
                                        <option value="0">--- ROOT ---</option>
                                        <?php menuMulti($parent, 0, $str = "---|", $data['parent_id']);?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tên Loại</span>
                                    </div>
                                    <input type="text" name="txtCateName" class="form-control"
                                           value="{!! old('txtCateName'), isset($data["name"]) ? $data['name'] : null !!}" required/>
                                </div>
                                <div class="input-group mb-3">
                                    <label>
                                        <input type="radio" name="rdoPublic" value="1"
                                               @if($data['is_active'] ==1)
                                               checked
                                                @endif
                                        />
                                        active
                                    </label>
                                    <label class="pl-2">
                                        <input type="radio" name="rdoPublic" value="0"
                                               @if($data['is_active'] ==0)
                                               checked
                                                @endif
                                        />
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