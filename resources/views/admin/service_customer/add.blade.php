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
        
        td {
            display: inline-flex;
        }
        .row {
            width: inherit;
        }

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

</head>
    <div class="table-agile-info">
        <div class="col-lg-12 ">
            <h5>Thêm mới Dịch vụ khách hàng</h5>
        </div>

        <div class="panel panel-default">
            <table class="table">
                <tbody>
                    
                <tr class="cus_det_data">

                    <td width="100%">
                        Thông tin khách hàng: 
                    </td>

                    {{-- <td width="100%">
                        <div class="row">
                            <div class="col-lg-4">
                                <span>Họ & tên khách hàng:</span> <input type="text" name="txtPhone" value="{!! isset($data->pay_type) ? $data->pay_type : null !!}"
                                                        class="form-control">
                            </div>
                            <div class="col-lg-4">
                                Số điện thoại:
                                 <input class="form-control" type="number" name="txtPhone" value="{!! isset($data->phone) ? $data->phone : null !!}">
                            </div>

                            <div class="col-lg-4">
                                Email:
                                 <input class="form-control" type="email" name="txtEmail" value="{!! isset($data->phone) ? $data->phone : null !!}">
                            </div>
                            
                        </div>
                    </td> --}}

                <form action="" name="create-data" id="create-data" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <td width="100%">
                        <div class="row">
                            
                           

                            <div class="col-lg-4">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px"> Số điện thoại:</span>
                                    </div>

                                    <select id="phone_customer" name="phone_customer"  class="form-control">
                                         {{-- <option selected="selected">white</option> --}}
                                        @foreach ($phone_customers as $phone)
                                            <option value="{{$phone}}">{{ $phone}}</option>
                                        @endforeach
                                    </select>
                                
                                    {{-- <input required  class="form-control" type="number" name="phone_customer" value="{!! isset($data->phone) ? $data->phone : old('phone_customer') !!}"> --}}
                                    
                                </div>
                       
                               
                            </div>

                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px">Họ & tên KG:</span>
                                    </div>
        
                                    <input required type="text" name="name_customer" value="{!! isset($data->name_customer) ? $data->name_customer : old('name_customer') !!}"
                                    class="form-control">
                                    
                                </div>
                            </div>

                            
                        </div>
                    </td>

                </tr>

                <tr class="cus_det_data">
                    <td width="100%">
                        Thông tin sản phẩm:
                    </td>

                    <td width="100%">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 200px">Tên sản phẩm:</span>
                                    </div>

                                    <input type="text" name="product_name" class="form-control" value="{!! !empty( $data->product_name) ? $data->product_name : old('product_name') !!} " />

                                </div>
                            </div>
                                 
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 200px">Hình thức nhận hàng:</span>
                                    </div>
                                    <select id="service_type" name="service_type" class="form-control"
                                            style="height: auto">
                                        <option {{(!empty($data->service_type) && $data->service_type == 1 ) ? 'selected' : ''}} value="1">
                                        Sửa chữa</option>
                                        <option {{(!empty($data->service_type) && $data->service_type == 2 ) ? 'selected' : ''}}  value="2">Vệ sinh máy tính</option>
                                      
                                    </select>


                                </div>
                            </div>
                                                      
                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 200px">Ngày nhận :</span>
                                    </div>
                                    <span  class="input-group-text" style>Mã vận đơn:</span>
                                    
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 200px">Mã vận đơn:</span>
                                    </div>

                                    <input type="text" name="lading_code" class="form-control" value="{!! !empty( $data->lading_code) ? $data->lading_code : '' !!} " />

                                </div>
                            </div> --}}

                            
                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 200px">Mã vận đơn:</span>
                                    </div>

                                    <input type="text" name="lading_code" placeholder="Nhập mã vận đơn" class="form-control" value="{!! !empty( $data->lading_code) ? $data->lading_code : '' !!} " required/>

                                </div>
                            </div>    --}}

                            <div class="col-lg-12">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 200px">Tình trạng khi nhận máy:</span>
                                    </div>

                                    <textarea required name="condition" id="condition" class="form-control" rows="3" placeholder="Ghi chú">{!! $data->condition ?? old('condition') !!}</textarea>

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
                                Thông tin hạng mục:
                            </span>
                              
                       
                            <button onclick="addItem()"  style="margin-left: auto;" type="button" class="btn btn-success">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> Thêm hạng mục
                            </button>   
                    </td>

                    <td width="100%">

                        <table class="table">
                            <thead>
                                <tr  class="bg-light">
                                    <th>STT</th>
                                    <th>Tên hạng mục</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody style="width: 100%">
                                @if(!empty($data->serviceCustomerDetail))
                                @php
                                $stt = 0;
                                $stt++;
                                    // $dataDetails = $data->dataDetail ;
                                    // $total_real_price = 0;
                                    // $total_ck = 0;
                                    // $sum =  $dataDetails->sum(function ($de) use ( &$total_real_price ) {
                                    //             $p = !empty($de->real_price) ? $de->real_price : $de->price;
                                    //             $total_real_price += ($p * $de->qty);
                                                
                                    //         });
                                @endphp
                                    @foreach ($data->serviceCustomerDetail as $dataDetail)
                                        <tr >
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{$stt}}
                                            </th>
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($dataDetail, 'item')}}
                                            </th>

                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format(data_get($dataDetail, 'unit_price') )  .'đ'}}
                                            </th>

                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($dataDetail, 'qty')}}
                                            </th>
                                            
                                            <th style="      font-weight: normal;  font-size: 0.9em;">
                                                {{ number_format(data_get($dataDetail, 'total') )  .'đ'}}
                                            </th>
                                            
                                            <th style="     max-width: 225px;     font-weight: normal;  font-size: 0.9em;">
                                                {{data_get($dataDetail, 'created_at')}}
                                            </th>
                                        
                                            <th style="   width: 8%;   font-weight: normal;">
                                             
                                                <a  href="{{ route('deleteOrderDetail' , ['id_data_detail' => $dataDetail->id_service_customer_detail])}}" style="font-size:10px!important;"  type="button" class="btn btn-danger">
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
                                            <span class="badge badge-success">

                                                {{number_format( data_get($data, 'total') )  .'đ'}}

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

            {{-- @if(!empty($data))
                <div class="col-lg-6">
                    <a href="{{ route("cancelOrderDraft", ['id_data' =>  $data->id])}} "  class="btn btn-danger" >Hủy đơn hàng</a>
                </div>
            @endif
             --}}
            <div  class="col-lg-6">
                <button  style="float: right!important;"  type="submit" name="btnNewsAdd"  class="btn btn-success" >Tạo Dịch vụ khách hàng</button> 
                
            </div>
        </div>

        <input name="add_item" id="add_item" class="form-control" type="hidden"  value="0"/>
        <input name="id_service_customer" id="id_service_customer" class="form-control" type="hidden"  value="{{$data->id_service_customer ?? ''}}"/>

        {{-- <div class="col-lg-12">
            <button type="submit" name="btnNewsAdd"  class="btn btn-success" >Tạo đơn hàng</button> --}}

    </div>

    </form>

    <script>

        function addItem(){
            $('#add_item').val(1);
            $('#create-data').submit();
        }

     

        $(document).ready(function() {
            $("#phone_customer").select2({
                tags: true
            });
        });


       
   </script>

@endsection