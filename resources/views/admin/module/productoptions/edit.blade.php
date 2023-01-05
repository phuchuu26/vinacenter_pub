@extends('admin.master')
@section('title','Thêm Options')
@section('content')
<div class="form-w3layouts">
	<form action="" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">

			<div class="col-lg-12 mb-4">
				<h6>Cập nhật Option</h6>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Tên option</span>
					</div>
					<input type="text" name="txtName" class="form-control" value="{!! old('txtName',isset($productoption["name"]) ? $productoption["name"] : null) !!}" />
				</div>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Giá dealer</span>
					</div>
					<input type="text" name="txtdealer" class="form-control" value="{!! old('txtdealer',isset($productoption["dealer"]) ? $productoption["dealer"] : null) !!}" required/>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Giá web</span>
					</div>
					<input type="text" name="txtValue" class="form-control" value="{!! old('txtValue',isset($productoption["value"]) ? $productoption["value"] : null) !!}" />
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
					<input type="text" id="txtamount" name="txtamount" class="form-control" value="{!! old('txtamount',isset($productoption["amount"]) ? $productoption["amount"] : null) !!}" required/>
				</div>
			</div>
			<div class="col-lg-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 250px">Thời gian Bảo hành</span>
                        </div>
                        <input type="number" name="txtwarranty" class="form-control" value="{!! old('txtamount',isset($productoption["warranty"]) ? $productoption["warranty"] : null) !!}" required/> (tháng) 
                    </div>
                </div>
			<div class="col-lg-12">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 250px">Vị trí trên trang chủ</span>
					</div>
					<input type="text" name="txtindextop" class="form-control" value="{!! old('txtindextop',isset($productoption["indextop"]) ? $productoption["indextop"] : null) !!}" />
				</div>
			</div>
			
			<div class="col-lg-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 200px">Voucher Code</span>
					</div>
					<input type="text" name="code" class="form-control" value="{!! $voucher->code ?? '' !!}"/>
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 200px">Số tiền giảm giá</span>
					</div>
					<input type="number" name="amount_discount" class="form-control" value="{!! $voucher->amount_discount ?? '' !!}"/>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="form-group">
					<label for="usr">Mô tả</label>
					<textarea name="txtIntro" rows="10" class="form-control">{!! old('txtIntro',isset($productoption["sumary"]) ? $productoption["sumary"] : null) !!}</textarea>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label for="usr">Thông tin khuyến mãi</label>
					<textarea name="txtsaleoff" rows="10" class="form-control">{!! old('txtsaleoff',isset($productoption["saleoff"]) ? $productoption["saleoff"] : null) !!}</textarea>
				</div>
			</div>
		<div class="col-lg-12">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" style="width: 250px">Chọn hình đại diện</span>
				</div>
				<select name="sltImg" class="form-control">
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
				<select name="sltSales" class="form-control">
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
				<select name="sltCollect" class="form-control">
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
		
		<div class="col-lg-12">
		
            <table class="table col-lg-12 table bg-light" >
                <tr >
                    <td width="100%">
                            <span>
                                Thông tin Option màu sắc:
                            </span>
                              
                            <a style=" float: right;" href="{{route('getAddColorDetail', [ 'id_product_option' => data_get($productoption, 'id') ])}}" b class="btn btn-success">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm Option màu sắc
                            </a>   
                    </td>
				</tr >
				
				<tr >
                    <td width="100%">

                        <table class="table">
                            <thead>
                                <tr  class="bg-light">
                                    <th>STT</th>
                                    <th>Màu sắc</th>
                                    <th>Đơn giá</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày chỉnh sửa</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody style="width: 100%">
                                @if(!empty($color_details))
                                @php
                                $stt = 0;
                                @endphp
                                    @foreach ($color_details as $item)
                                        @php
                                            $stt++;
                                        @endphp
                                        <tr >
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{$stt}}
                                            </th>
                                            <th style="     width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{$item->color->name_color}}
                                            </th>

                                            <th style="   width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format(data_get($item, 'value') )  .'đ'}}
                                            </th>
                                            
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($item, 'created_at')}}
                                            </th>
                                    
											<th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($item, 'updated_at')}}
                                            </th>

                                            <th style="   width: 12%;   font-weight: normal;">
                                                  
                                                <a  href="{{ route('getEditColorDetail' , ['id_product_option' => $item->id_product_option, 'id_color_detail' => $item->id_color_detail ])}}" style="font-size:10px!important;"  type="button" class="btn btn-info">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa Option
                                                </a>  
                                            </th>

											<th style="   width: 10%;   font-weight: normal;">
                                                  
                                                <a  href="{{ route('getDeleteColorDetail' , ['id_product_option' => $item->id_product_option, 'id_color_detail' => $item->id_color_detail ])}}" style="font-size:10px!important;"  type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xoá Option
                                                </a>  
                                            </th>
                                        </tr>
                                    @endforeach

                                   
                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
           
		</div>

			<div class="col-lg-12">
		
            <table class="table col-lg-12 table bg-light" >
                <tr >
                    <td width="100%">
                            <span>
                                Thông tin Option Phụ kiện:
                            </span>
                              
                            <a style=" float: right;" href="{{route('getAddAccessoryDetail', [ 'id_product_option' => data_get($productoption, 'id') ])}}" b class="btn btn-success">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm Option Phụ kiện
                            </a>   
                    </td>
				</tr >
				
				<tr >
                    <td width="100%">

                        <table class="table">
                            <thead>
                                <tr  class="bg-light">
                                    <th>STT</th>
                                    <th>Phụ kiện</th>
                                    <th>Đơn giá</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày chỉnh sửa</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody style="width: 100%">
                                @if(!empty($accessory_details))
                                @php
                                $stt = 0;
                                
                                @endphp
                                    @foreach ($accessory_details as $item)
                                        @php
                                            $stt++;
                                        @endphp
                                        <tr >
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{$stt}}
                                            </th>
                                            <th style="     width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{$item->accessory->name_accessory}}
                                            </th>

                                            <th style="   width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format(data_get($item, 'value') )  .'đ'}}
                                            </th>
                                            
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($item, 'created_at')}}
                                            </th>
                                    
											<th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($item, 'updated_at')}}
                                            </th>

                                            <th style="   width: 12%;   font-weight: normal;">
                                                  
                                                <a  href="{{ route('getEditAccessoryDetail' , ['id_product_option' => $item->id_product_option, 'id_accessory_detail' => $item->id_accessory_detail ])}}" style="font-size:10px!important;"  type="button" class="btn btn-info">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa Option
                                                </a>  
                                            </th>

											<th style="   width: 10%;   font-weight: normal;">
                                                  
                                                <a  href="{{ route('getDeleteAccessoryDetail' , ['id_product_option' => $item->id_product_option, 'id_accessory_detail' => $item->id_accessory_detail ])}}" style="font-size:10px!important;"  type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xoá Option
                                                </a>  
                                            </th>
                                        </tr>
                                    @endforeach

                                   
                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
           
		</div>
		
		<input type="hidden" name="product_id" value="{!! $productoption["product_id"] !!}" />
		<input type="hidden" id="amount" value="{!! $productoption["amount"] !!}" />
		@if(\Auth::user()->role == '1')
			<div class="col-lg-12">
			<br>
			</div>
			
			
			<div class="col-lg-12"><input type="submit" name="btnProAdd" value="Cập nhật Option" class="btn btn-info pull-right btn_option_update" /></div>
			</div>
		@endif
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