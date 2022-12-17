@extends('admin.master')
@section('title','Chi tiết đơn hàng')
@section('content')
<head>
    <style>
        td {
            display: inline-flex;
        }
        .row {
            width: inherit;
        }
    </style>
</head>
    <div class="table-agile-info">
        <div class="col-lg-12 ">
            <h5>Thêm mới Đơn hàng</h5>
        </div>

        <div class="panel panel-default">
            <table class="table">
                <tbody>
                    
                <tr class="cus_det_order">

                    <td width="100%">
                        Thông tin khách hàng: 
                    </td>

                    {{-- <td width="100%">
                        <div class="row">
                            <div class="col-lg-4">
                                <span>Họ & tên khách hàng:</span> <input type="text" name="txtPhone" value="{!! isset($customer->pay_type) ? $customer->pay_type : null !!}"
                                                        class="form-control">
                            </div>
                            <div class="col-lg-4">
                                Số điện thoại:
                                 <input class="form-control" type="number" name="txtPhone" value="{!! isset($customer->phone) ? $customer->phone : null !!}">
                            </div>

                            <div class="col-lg-4">
                                Email:
                                 <input class="form-control" type="email" name="txtEmail" value="{!! isset($customer->phone) ? $customer->phone : null !!}">
                            </div>
                            
                        </div>
                    </td> --}}

                <form action="" name="create-order" id="create-order" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <td width="100%">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px">Họ & tên KG:</span>
                                    </div>
        
                                    <input required type="text" name="txtName" value="{!! isset($customer->fullname) ? $customer->fullname : old('txtName') !!}"
                                    class="form-control">
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px"> Số điện thoại:</span>
                                    </div>
        
                                    <input required  class="form-control" type="number" name="txtPhone" value="{!! isset($customer->phone) ? $customer->phone : old('txtPhone') !!}">
                                    
                                </div>
                       
                               
                            </div>

                            <div class="col-lg-4">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px">     Email:</span>
                                    </div>
                                    <input required class="form-control" type="email" name="txtEmail" value="{!! isset($customer->email) ? $customer->email : old('txtEmail') !!}">
                                    
                                </div>
                       
                            
                            </div>
                            
                        </div>
                    </td>

                </tr>
<br>
                <tr class="cus_det_order">

                    <td width="100%">
                           Địa chỉ liên lạc:
                    </td>
                    <td width="100%">
                        @if(!empty($customer->address))
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="input-group mb-9">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 150px">Địa chỉ gửi hàng</span>
                                        </div>
            
                                        <input type="text" name="txtAddress" class="form-control" value="{!! $customer->address ?? '' !!}" required/>
                                        
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-4">
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
                                <div class="col-lg-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 150px">Quận, huyện</span>
                                        </div>
            
                                        <select  style="height: auto" class="form-control" id="district" name="district" required>
                                                <option value=""></option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 150px">Phường, xã</span>
                                        </div>
            
                                        <select  style="height: auto" class="form-control" id="ward" name="ward" required>
                                                <option value=""></option>
                                        </select>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-lg-9">
                                    <div class="input-group mb-9">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 150px">Số nhà</span>
                                        </div>
                                        <input type="text" name="str_address" class="form-control" value="{!! $customer->address ?? old('str_address') !!}" required/>
                                    </div>
                                </div>
                                
                            </div>

                            @endif
                    </td>

                </tr>

                <tr class="cus_det_order">
                    <td width="100%">
                        Thông tin khác:
                    </td>

                    <td width="100%">
                        <div class="row">
                            
                                 
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Hình thức nhận hàng:</span>
                                    </div>
                                    <select id="optradio" name="optradio" class="form-control"
                                            style="height: auto">
                                        <option {{(!empty($order->sendby) && $order->sendby == 'Gửi hàng theo địa chỉ liên lạc' ) ? 'selected' : ''}} value="Gửi hàng theo địa chỉ liên lạc">Gửi hàng theo địa chỉ liên lạc</option>
                                        <option {{(!empty($order->sendby) && $order->sendby == 'Nhận tại cửa hàng' ) ? 'selected' : ''}}  value="Nhận tại cửa hàng">Nhận tại cửa hàng</option>
                                      
                                    </select>


                                </div>
                            </div>
                                                      
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Hình thức thanh toán:</span>
                                    </div>
                                     <select style="height: auto" class="form-control" id="rdopay" name="rdopay" required>
                                            <option  {{(!empty($order) && $order->payment == 1 ) ? 'selected' : ''}}   value="1">Thanh toán khi nhận hàng: TM | Cod.</option>
                                            <option {{(!empty($order) && $order->payment == 0 ) ? 'selected' : ''}} value="0">Chuyển khoản (Internet Banking | Momo)</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Mã vận đơn:</span>
                                    </div>

                                    <input type="text" name="lading_code" class="form-control" value="{!! !empty( $customer->lading_code) ? $customer->lading_code : '' !!} " />

                                </div>
                            </div> --}}

                            
                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Mã vận đơn:</span>
                                    </div>

                                    <input type="text" name="lading_code" placeholder="Nhập mã vận đơn" class="form-control" value="{!! !empty( $customer->lading_code) ? $customer->lading_code : '' !!} " required/>

                                </div>
                            </div>    --}}

                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Yêu cầu khác:</span>
                                    </div>

                                    <input type="text" name="txtNote" placeholder="Nhập mô tả yêu cầu" class="form-control" value="{!! !empty( $order->note) ? $order->note : old('txtNote') !!} " />

                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Người bán:</span>
                                    </div>
                                    <select class="form-control" id="txtUser" name="txtUser">
                                        @foreach($user as $item)
                                            @if(!empty( $customer)  && $item['username'] == data_get($customer, 'user_id', ''))
                                                <option value="{!! $item['username']!!}"
                                                        selected="">{!! $item['name']!!}</option>
                                            @else
                                                <option value="{!! $item['username']!!}">{!! $item['name']!!}</option>
                                            @endif
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px"> Người trả phí:</span>
                                    </div>
                                    <select id="express_human" name="express_human" class="form-control"
                                            style="height: auto">
                                        <option value="3" {{(!empty($order->express_human) && $order->express_human == 3 ) ? 'selected' : ''}}>Khách trả phí ship</option>
                                        <option value="2" {{(!empty($order->express_human) && $order->express_human == 2 ) ? 'selected' : ''}}>Sale trả phí ship</option>
                                        <option value="1" {{(!empty($order->express_human) && $order->express_human == 1 ) ? 'selected' : ''}}>Shop trả phí ship</option>

                                    </select>


                                </div>
                            </div>

                                                             
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Đã thanh toán:</span>
                                    </div>
                                        <input placeholder="Nhập số tiền khách đã thanh toán trước" type="number" 
                                        class="form-control input_number" name="deposit" id="deposit"
                                               value="{!! $order->deposit ?? old('deposit') !!}">
                                               {{-- value="{!! !empty($order->deposit) ? number_format($order->deposit) . 'đ' : old('deposit') !!}"> --}}



                                </div>
                            </div>
                       

                        </div>
                    </td>

                </tr>

                </tbody>
            </table>

            <table class="table col-lg-12 table bg-light" >
                <tr >
                    <td width="100%">
                            <span>
                                Thông tin sản phẩm:
                            </span>
                              
                       
                            <button onclick="addProduct()"  style="margin-left: auto;" type="button" class="btn btn-success">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm sản phẩm
                            </button>   
                    </td>

                    <td width="100%">

                        <table class="table">
                            <thead>
                                <tr  class="bg-light">
                                    <th>Tên sản phẩm</th>
                                    <th>SL</th>
                                    <th>Giá dealer</th>
                                    <th>Giá web</th>
                                   
                                    <th>Giá sale</th>
                                    <th>Thành tiền</th>
                                    <th>Chiếc khấu</th>
                                    <th>Bảo hành</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody style="width: 100%">
                                @if(!empty($order->orderDetail))
                                @php
                                    $orderDetails = $order->orderDetail ;
                                    $total_real_price = 0;
                                    $total_ck = 0;
                                    $sum =  $orderDetails->sum(function ($de) use ( &$total_real_price ) {
                                                $p = !empty($de->real_price) ? $de->real_price : $de->price;
                                                $total_real_price += ($p * $de->qty);
                                                
                                            });
                                @endphp
                                    @foreach ($order->orderDetail as $orderDetail)
                                        <tr >
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($orderDetail, 'product_name')}}
                                            </th>

                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($orderDetail, 'qty')}}
                                            </th>
                                            
                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format(data_get($orderDetail, 'dealer') )  .'đ'}}
                                            </th>
                                            
                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format(data_get($orderDetail, 'price')).'đ' }}
                                            </th>
                                         @php
                                             $p = !empty(data_get($orderDetail, 'real_price')) ? data_get($orderDetail, 'real_price') : 
                                                        data_get($orderDetail, 'price');
                                            $qty = data_get($orderDetail, 'qty')

                                         @endphp
                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{
                                                    number_format($p) .'đ'
                                                }}
                                            </th>
                                            
                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format($p *  $qty) .'đ' }}
                                            </th>
                                            
                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                <span class="badge badge-success">
                                                    @php
                                                       $total_ck += $qty * ($p - $orderDetail->dealer);
                                                    @endphp
                                                    {{number_format($qty * ($p - $orderDetail->dealer) ) .'đ'}}

                                                </span>
                                            </th>

                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format($orderDetail->productOption->warranty) .' tháng' }}
                                            </th>
                                            
                                            <th style="   width: 8%;   font-weight: normal;">
                                             
                                                <a  href="{{ route('deleteOrderDetail' , ['id_order_detail' => $orderDetail->id])}}" style="font-size:10px!important;"  type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xoá SP
                                                </a>  
                                            </th>
                                        </tr>
                                    @endforeach

                                    <tr >
                                        <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                            Tổng cộng : 
                                        </th>

                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                           
                                        </th>
                                        
                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                         
                                        </th>
                                        
                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                        </th>

                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                           
                                        </th>
                                        
                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                            {{number_format($total_real_price)  .'đ'}}
                                        </th>
                                        
                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                            <span class="badge badge-success">

                                                {{number_format($total_ck)  .'đ'}}

                                            </span>
                                        </th>

                                        <th style="      font-weight: normal;  font-size: 0.9em;">
                                        </th>
                                        
                                        <th style="   width: 8%;   font-weight: normal;">
                                         
                                        </th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
           
        </div>
        <div class="row">

            @if(!empty($order))
                <div class="col-lg-6">
                    <a href="{{ route("cancelOrderDraft", ['id_order' =>  $order->id])}} "  class="btn btn-danger" >Hủy đơn hàng</a>
                </div>
            @endif
            
            <div  class="col-lg-6">
                <button  style="float: right!important;"  type="submit" name="btnNewsAdd"  class="btn btn-success" >Tạo đơn hàng</button> 
                
            </div>
        </div>

        {{-- <div class="col-lg-12">
            <button type="submit" name="btnNewsAdd"  class="btn btn-success" >Tạo đơn hàng</button> --}}

    </div>
    <input name="add_product" id="add_product" class="form-control" type="hidden"  value="0"/>
    <input name="id_order" id="id_order" class="form-control" type="hidden"  value="{{$order->id ?? ''}}"/>

    </form>

    <script>

        function addProduct(){
            $('#add_product').val(1);
            $('#create-order').submit();
        }

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

@endsection