@extends('frontend.master')
@section('title',"Đặt hàng")
@section('content')
    <head>
        <style>
            .input-group.mb-3 {
                margin-left: 191px;
            }
        </style>
    </head>
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <li class="home">
                            <a itemprop="url" href="/" title="Trang chủ">
                                <span itemprop="title">Trang chủ</span>
                            </a>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </li>
                        <li>
                            <strong itemprop="title">Đặt hàng</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- main-container -->
   
    <div class="main container">
        <div class="row">
            <div class="col-lg-2">
                <h4>Thông tin đơn hàng</h4>
            </div>
            @include('admin.blocks.flash')
            <div class="col-lg-10" style="float: right">
                <a href="{!! url('gio-hang') !!}" class="btn btn-warning" role="button"
                   style="float: right; margin: 10px">
                    <i class="fas fa-cart-arrow-down"></i>
                    Giỏ hàng của bạn
                </a>
                <a href="{!! url('trang-chu') !!}" class="btn btn-info" role="button"
                   style="float: right; margin: 10px">
                    <i class="fas fa-cart-arrow-down"></i> Tiếp tục mua hàng
                </a>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Mã giảm giá</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $key => $item)
                    {{-- {{dd($item)}} --}}
                        <tr>
                            <td width="30%">{!! $item->name !!}</td>
                            <td width="20%">{!! number_format($item->price) !!} VNĐ</td>
                            <td id="qty_{{$item->rowId}}" width="10%">
                                {!! $item->qty !!}
                            </td>

                            <td id="" class="" width="20%">
                                <input  class="voucher-code form-control" id="{{$item->rowId}}" name="voucher"
                                value="{{$item->voucher_code ?? ''}}">
                                <span style="" id="error_des_{{$item->rowId}}"></span>
                            </td>

                            <td class="summary" id="summary_{{$item->rowId}}" width="20%">{!! number_format($item->summary) !!} VNĐ</td>
                            <td width="10%">
                                <div class="d-flex text-white">
                                    <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapse{{$key}}">
                                        Edit
                                    </a>
                                    <a href="{!! route('getCartDel1',['id'=> $item->rowId]) !!}"
                                       class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o" title="Xóa"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @if (!Auth::guest())
                            <tr id="collapse{{$key}}" class="collapse" data-parent="#accordion">
                                <td colspan="5">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form class="w-100" data-action="{{ route('getUpdateQty') }}"
                                                  id="frm_edit_cart_qty{{$key}}"
                                                  method="POST" enctype='multipart/form-data'>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" class="form-control" id="txtId" name="txtId"
                                                       value="{{$item->rowId}}">

                                                <input type="hidden" class="form-control" id="txtqty_max"
                                                       name="txtqty_max"
                                                       value="{{$item->amount}}">
                                                <input type="hidden" class="form-control" id="txtqty_old"
                                                       name="txtqty_old"
                                                       value="{{$item->qty}}">

                                               
                                                       {{-- <td data-th="Voucher">
                                                        <input id="{!! $item->rowId !!}" name="{!! $item->rowId !!}" type="text" 
                                                        class="voucher-code form-control text-center" value="{!! $item->voucher ?? '' !!}" >
                                                      </td> --}}
                                        

                                                <div class="form-group">
                                                    <span class="text-secondary">SL(còn lại {{$item->amount}} sp)</span>
                                                    <span class="text-danger d-none" id="error_qty"></span>
                                                    <input type="number" frm="frm_edit_cart_qty{{$key}}" alt='frm_complete'
                                                           class="form-control btn_update_qty" id="txtQty"
                                                           name="txtQty"
                                                           min="1" step="1" max="{{$item->amount}}"
                                                           value="{!! $item->qty !!}">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-lg-6">
                                            <form class="w-100" data-action="{{ route('getUpdatePrice') }}"
                                                  id="frm_edit_cart_yprice{{$key}}"
                                                  method="POST" enctype='multipart/form-data'>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" class="form-control" id="txtId" name="txtId"
                                                       value="{{$item->rowId}}">
                                                <input type="hidden" class="form-control" id="dealer" name="dealer"
                                                       value="{{$item->options->dealer}}">

                                                <div class="form-group">
                                                    <span class="text-secondary">Giá Sale</span>
                                                    <span class="text-danger d-none" id="alert_yprice">(Giá không hợp lệ)</span>
                                                    <input type="text" frm="frm_edit_cart_yprice{{$key}}" alt='frm_complete'
                                                           class="form-control btn_update_price input_number"
                                                           id="yprice" name="yprice"
                                                           value="{!! $item->options->yprice != '' ? number_format($item->options->yprice) : 0!!}">
                                                </div>
                                            </form>
                                        </div>


                                    </div>

                                </td>
                            </tr>
                        @else
                            <tr id="collapse{{$key}}" class="collapse" data-parent="#accordion">
                                <td colspan="10" class="text-danger">Đăng nhập để sử dụng chức năng này</td>
                            </tr>
                        @endif

                    @endforeach
                    </tbody>
                    <input hidden id="urlGetTotalCart" value="{{route('getTotalCart')}}" type="text">
                </table>
            </div>
            <div class="col-lg-12">
                <span  style="float: right; display: -webkit-inline-box;">- Tổng cộng :  &nbsp
                    <p id="span_total">
                        {!! $total.' VNĐ' !!}
                    </p>
                </span>
            </div>
        </div>
        <form id="getCartOrderComplete" name="getCartOrderComplete" action="{{ route('getCartOrderComplete') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Vui lòng điền các thông tin bên dưới để hoàn tất đơn hàng.</h4>
                </div>
                <div class="col-lg-12">
                    <h6>(<span style="color: red">*</span> ): Thông tin bắt buộc</h6>
                </div>
                <div class="col-lg-12">
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-2">
                           - Họ và tên: <span style="color: red">*</span>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="txtName" id="txtName" maxlength="50"
                                   value="{!! old('txtName') !!}">
                        </div>
                        <div class="col-lg-4">
                            @if($errors->has('txtName'))
                                <div class="error">{{ $errors->first('txtName') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">

                        <div class="col-lg-8">
                            <label for="txtAddress">- Địa chỉ liên lạc: <span style="color: red">*</span></label>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Tỉnh</span>
                                </div>
    
                                <select style="height: auto" class="form-control" id="province" name="province" required>
                                    @foreach($provinces as $item)
                                        <option value="{!! $item['id_province']!!}">{!! $item['str_province']!!}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        
                       
                        <div class="col-lg-3">
                        </div>

                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Quận, huyện</span>
                                </div>
    
                                <select  style="height: auto" class="form-control" id="district" name="district" required>
                                        <option value=""></option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
    
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Phường, xã</span>
                                </div>
    
                                <select  style="height: auto" class="form-control" id="ward" name="ward" required>
                                        <option value=""></option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
    
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 150px">Số nhà</span>
                                </div>
                                <input type="text" name="str_address" class="form-control" value="{!! old('str_address') !!}" required/>
                            </div>
                        </div>

{{-- 
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="txtAddress" id="txtAddress"
                                   maxlength="200" value="{!! old('txtAddress') !!}">
                        </div> --}}
                        
                        <div class="col-lg-4">
                            @if($errors->has('txtAddress_complete'))
                                <div class="error">{{ $errors->first('txtAddress_complete') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-2">
                            <label for="txtPhone">- Số điện thoại: <span style="color: red">*</span></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" class="form-control" name="txtPhone" id="txtPhone"
                                   value="{!! old('txtPhone') !!}">
                        </div>
                        <div class="col-lg-4">
                            @if($errors->has('txtPhone'))
                                <div class="error">{{ $errors->first('txtPhone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-2">
                            <label for="txtEmail">- Địa chỉ email:</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="txtEmail" id="txtEmail"
                                   value="{!! old('txtEmail') !!}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-2">
                            <label for="txtEmail">- Ghi chú:</label>
                        </div>
                        <div class="col-lg-6">
                            <textarea name="txtNote" id="txtNote" class="form-control" rows="3"
                                      placeholder="Yêu cầu khác ( không bắt buộc )">{!! old('txtNote') !!}</textarea>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked="checked"
                                           value="Gửi hàng theo địa chỉ liên lạc">Gửi hàng theo địa chỉ liên lạc
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" value="Nhận tại cửa hàng">Nhận tại cửa hàng
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="rdopay" checked="checked" value="1">Thanh toán khi nhận hàng: TM | Cod.
                                </label>
								<label class="radio-inline">
                                    <input type="radio" name="rdopay" value="0">Chuyển khoản (Internet Banking | Momo)
                                </label>
                            </div>
                        </div>
                    </div>
                    @if (Auth::guest())
                        <div class="row ">
                            <div class="col-lg-2">Chọn Người bán <span style="color: red">*</span></div>
                            <div class="col-lg-3">
                                <select id="txtUser" name="txtUser" class="form-control" style="height: auto">
                                    <option value="">--Chọn người bán--</option>
                                    @foreach($user as $item)
                                        <option value="{!! $item['username']!!}"
                                                @if(old('txtUser') == $item['name']) selected @endif
                                        >{!! $item['name']!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <label for="txtEmail">- Đã thanh toán:</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" name="deposit" id="deposit"
                                       value="{!! old('deposit') !!}">
                            </div>
                            <div class="col-lg-4">
                                @if($errors->has('txtUser'))
                                    <div class="error">{{ $errors->first('txtUser') }}</div>
                                @endif
                            </div>

                        </div>
                    @else
                        <input type="hidden" name="txtUser" value="{{ Auth::user()->username }}">
                        <div class="row">
                            <div class="col-lg-2">- Phí Ship:</div>
                            <div class="col-lg-3">
                                <select id="express_human" name="express_human" class="form-control"
                                        style="height: auto">
									<option value="3">Khách trả phí ship</option>
									<option value="2">Sale trả phí ship</option>
                                    <option value="1">Shop trả phí ship</option>
                   			   </select>
                            </div>
                            <div class="col-lg-1">
                                <label for="txtEmail">- Đã thanh toán:</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input_number" name="deposit" id="deposit"
                                       value="{!! old('deposit') !!}">
                            </div>
                            <div class="col-lg-4">
                                @if($errors->has('txtUser'))
                                    <div class="error">{{ $errors->first('txtUser') }}</div>
                                @endif
                            </div>

                        </div>

                    @endif

                    <div class="row mt-4">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="btn_update">
                                    Hoàn tất đặt hàng.
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        var option_districs = $('#district');
        var option_wards = $('#ward');

      
      
       getDistrict();
       // getWard();

       function getDistrict(){
           var id_district = '{{$info_user->id_district ?? ''}}';
         
           $('#district').find('option').remove();
           var id_province = $('#province').children('option:selected').val();

           var url = '/login/get-district/' + id_province;
           $.ajax({
               type: 'GET',
               url: url,
               dataType: 'JSON',
               success: function(result) {
                   var jsonData = result;
                   
                   $.each( jsonData, function( key, value ) {
                       if(id_district != null && id_district == value.id_district){
                           option_districs.append(  `<option selected value="${value.id_district}">${value.str_district}</option>` );
                       }else{
                           option_districs.append($('<option>', {value: value.id_district, text: value.str_district}));
                       }

                   });
                   getWard();
                   option_districs.removeAttr('disabled');
               },
               fail: function(errors) {
                   alert(errors);
                   option_districs.removeAttr('disabled');
               }
           });
       }

       function getWard()
       {
           var id_ward = '{{$info_user->id_ward ?? ''}}';
           $('#ward').find('option').remove();
           var id_district = $('#district').children('option:selected').val();

        
           var url = '/login/get-ward/' + id_district;
           $.ajax({
               type: 'GET',
               url: url,
               dataType: 'JSON',
               success: function(result) {
                   var jsonData = result;
                   $.each( jsonData, function( key, value ) {
                       // option_wards.append($('<option>', {value: value.id_ward, text: value.str_ward}));
                           
                       if(id_ward != null && id_ward == value.id_ward){
                           option_wards.append(  `<option selected value="${value.id_ward}">${value.str_ward}</option>` );
                       }else{
                           option_wards.append($('<option>', {value: value.id_ward, text: value.str_ward}));
                       }
                   });

                   option_wards.removeAttr('disabled');
               },
               fail: function(errors) {
                   alert(errors);
                   option_districs.removeAttr('disabled');
               }
           });

       }



       $('#province').change(function(){
           getDistrict();

       });

       $('#district').change(function(){
           getWard();
       });


       
   </script>

   
    <!--End main-container -->
@endsection