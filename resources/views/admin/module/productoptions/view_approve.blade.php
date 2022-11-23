@extends('admin.master')
@section('title','Thêm Options')
@section('content')
<div class="form-w3layouts">
	<form action="{{route('postProductViewApprove', ['id' => $id, 'pro_id' => $pro_id])}}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">

			<div class="col-lg-12 mb-4">
				<h6>Duyệt Option sản phẩm</h6>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Tên option</span>
					</div>
					<input disabled type="text" name="txtName" class="form-control" value="{!! old('txtName',isset($productoption["name"]) ? $productoption["name"] : null) !!}" />
				</div>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Giá dealer</span>
					</div>
					<input disabled type="text" name="txtdealer" class="form-control" value="{!! old('txtdealer',isset($productoption["dealer"]) ? $productoption["dealer"] : null) !!}" required/>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Giá web</span>
					</div>
					<input disabled type="text" name="txtValue" class="form-control" value="{!! old('txtValue',isset($productoption["value"]) ? $productoption["value"] : null) !!}" />
				</div>
			</div>
			<div id="alert" class="col-lg-12 d-none text-danger mb-4">
				<h6>Số lượng phải lớn hơn hoặc bằng {{$productoption["amount"]}}</h6>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Số lượng</span>
					</div>
					<input disabled type="text"  id="txtamount" name="txtamount" class="form-control" value="{!! old('txtamount',isset($productoption["amount"]) ? $productoption["amount"] : null) !!}" required/>
				</div>
			</div>
			<div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 250px">Thời gian Bảo hành</span>
                        </div>
                        <input disabled type="number" name="txtwarranty" class="form-control" value="{!! old('txtamount',isset($productoption["warranty"]) ? $productoption["warranty"] : null) !!}" required/> (tháng) 
                    </div>
                </div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Vị trí trên trang chủ</span>
					</div>
					<input disabled type="text" name="txtindextop" class="form-control" value="{!! old('txtindextop',isset($productoption["indextop"]) ? $productoption["indextop"] : null) !!}" />
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label for="usr">Mô tả</label>
					<textarea disabled name="txtIntro" rows="10" class="form-control">{!! old('txtIntro',isset($productoption["sumary"]) ? $productoption["sumary"] : null) !!}</textarea>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label for="usr">Thông tin khuyến mãi</label>
					<textarea disabled name="txtsaleoff" rows="10" class="form-control">{!! old('txtsaleoff',isset($productoption["saleoff"]) ? $productoption["saleoff"] : null) !!}</textarea>
				</div>
			</div>
		<div class="col-lg-12">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" style="width: 250px">Chọn hình đại diện</span>
				</div>
				<select disabled name="sltImg" class="form-control">
					@foreach($productImg as $item)
						@if($item['path'] == $productoption["image"])
							<option value="{!! $item['path'] !!}" selected >{!! $item['path'] !!}</option>
						@else
							<option value="{!! $item['path'] !!}">{!! $item['path'] !!}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" style="width: 250px">Thuộc lọai sản phẩm</span>
				</div>
				<select disabled name="sltSales" class="form-control">
					@foreach($productType as $item)
						@if($productoption["salestop_salesoff"]==$item['id'])
							<option value="{!! $item['id'] !!}" selected="">{!! $item['name'] !!}</option>
						@else
							<option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" style="width: 250px">Thuộc bộ sưu tập</span>
				</div>
				<select disabled name="sltCollect" class="form-control">
					@foreach($productCollection as $item)
						@if($productoption["collection_at"]==$item['id'])
							<option value="{!! $item['id'] !!}" selected="">{!! $item['name'] !!}</option>
						@else
							<option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
		<input type="hidden" name="product_id" value="{!! $productoption["product_id"] !!}" />
		<input type="hidden" id="amount" value="{!! $productoption["amount"] !!}" />
		<div class="col-lg-12"><input type="submit" name="btnProAdd" value="Duyệt Option Sản phẩm" class="btn btn-success pull-right btn_option_update" /></div>
		</div>
	</form>
</div>
<script type="text/javascript">


	var editor = CKEDITOR.replace('txtIntro',{
		language:'vi',
		filebrowserImageBrowseUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
		filebrowserImageUploadUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		toolbar: [
			[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
			[ 'FontSize', 'TextColor', 'BGColor', 'Smiley' ],
			[ 'NumberedList','BulletedList','-','Outdent','Indent','-','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'],
			['Table' ],
		]
	});
</script>
<script type="text/javascript">

	var editor = CKEDITOR.replace('txtsaleoff',{
		language:'vi',
		filebrowserImageBrowseUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/ckfinder.html?Type=Flash',
		filebrowserImageUploadUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../../../public/vnc_admin/templates/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		toolbar: [
			[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
			[ 'FontSize', 'TextColor', 'BGColor', 'Smiley' ],
			[ 'NumberedList','BulletedList','-','Outdent','Indent','-','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-'],
		]
	});
</script>
@endsection