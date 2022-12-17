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
            <h5>Thêm mới Sản phẩm Đơn hàng</h5>
        </div>

        <div class="panel panel-default">
            <table class="table">
                <tbody>
                <form action="{{ route('addProductOrder', ['id_order' =>  $order->id ])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
      
                <tr class="cus_det_order">
                    <td width="100%">
                        Thông tin sản phẩm:
                    </td>

                    <td width="100%">
                        <div class="row">
                            
                                 
                            <div class="col-lg-12">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">
                                            Tên sản phẩm:</span>
                                    </div>
                                    <select  id="id_product_option" name="id_product_option" required class="form-control"
                                            style="">
                                            @foreach($producOption as $option)
                                                <option value="{!! $option['id']!!}"> {{$option['name'] }}</option>
                                            @endforeach
                                      
                                    </select>
                                   


                                </div>
                            </div>
                                                      
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Đơn giá:</span>
                                    </div>

                                    <input required type="text" name="real_price" id="real_price" placeholder="Nhập đơn giá" class="form-control" value="{!! !empty( $customer->note) ? $customer->note : '' !!} " />

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Số lượng:</span>
                                    </div>

                                    <input required type="text" name="qty" class="form-control" value="{!! !empty( $customer->lading_code) ? $customer->lading_code : '' !!} " />

                                </div>
                            </div>

                            
                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Mã vận đơn:</span>
                                    </div>

                                    <input type="text" name="lading_code" placeholder="Nhập mã vận đơn" class="form-control" value="{!! !empty( $customer->lading_code) ? $customer->lading_code : '' !!} " required/>

                                </div>
                            </div>    --}}

                            {{-- <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Thành tiền:</span>
                                    </div>

                                    <input type="text" name="note" placeholder="Nhập mô tả yêu cầu" class="form-control" value="{!! !empty( $customer->note) ? $customer->note : '' !!} " />

                                </div>
                            </div> --}}

                        </div>
                    </td>

                </tr>

                </tbody>
            </table>

           
        </div>
        <div class="row">

            <div class="col-lg-6">
                <a href="{{ route("createOrder", ['id_order' =>  $order->id])}} "  class="btn btn-secondary" >Quay lại</a>
                
            </div>
            
            <div  class="col-lg-6">
                <button style="float: right!important;" type="submit" name="btnNewsAdd"  class="btn btn-success" >Thêm sản phẩm vào đơn hàng</button>
                
            </div>
        </div>

    </form>

    <script>
        $(document).ready(function() {
            searchProductOption()
            $("#id_product_option").change(function (e) {
               var price = getPriceProductOption($("#id_product_option").val());
               $('#real_price').html(price);
            });
        });

    </script>

@endsection