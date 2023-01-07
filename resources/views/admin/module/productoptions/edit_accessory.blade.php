@extends('admin.master')
@section('title','Thêm mới Option Phụ kiện')
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
            <h5>Thêm mới Option Phụ kiện</h5>
        </div>  

        <div class="panel panel-default">
            <table class="table">
                <tbody>

                    <form action="{{ route('postEditAccessoryDetail', ['id_product_option' =>  $productoption->id , 
                    'id_accessory_detail' => $accessoryDetail->id_accessory_detail ])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
      
                <tr class="cus_det_order">
                    <td width="100%">
                        Thông tin hạng mục:
                    </td>
                    
                    
                    @if(session()->has('message_error'))
                        <div class="alert alert-danger">
                            {{ session()->get('message_error') }}
                        </div>
                    @endif
                    <td width="100%">
                        <div class="row">
                            
                            <div class="col-lg-3">
                            </div>   
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">
                                            Chọn Phụ kiện:</span>
                                    </div>
                                    
                                    <select id="id_accessory" name="id_accessory"  class="form-control">
                                        @foreach ($accessory as $c)
                                            @if ($accessoryDetail->id_accessory == data_get($c, 'id_accessory'))
                                                <option selected value="{{$c['id_accessory']}}">{{ $c['name_accessory'] }}</option>
                                            @else   
                                                <option value="{{$c['id_accessory']}}">{{ $c['name_accessory'] }}</option>
                                           @endif
                                       @endforeach
                                   </select>

                                </div>
                            </div>

                        

                            <div class="col-lg-3">
                            </div>                  
                            <div class="col-lg-3">
                            </div>                  
                           
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">Đơn giá:</span>
                                    </div>
                                    <input required  type="number" name="value" id="value" placeholder="Nhập đơn giá" class="form-control" value="{{ 
                                        $accessoryDetail->value ?? 0}}" />

                                </div>
                            </div>

                             <div class="col-lg-3">
                            </div>                  

                            <div class="col-lg-3">
                            </div> 


                        </div>
                    </td>

                </tr>

                </tbody>
            </table>

           
        </div>
        <div class="row">

            <div class="col-lg-6">
                <a href="{{ route("getProductOptionEdit", ['id' => $productoption->id, 'pro_id' => $product->id])}} "  class="btn btn-secondary" >Quay lại</a>
                
            </div>
            
            <div  class="col-lg-6">
                <button style="float: right!important;" type="submit" name="btnNewsAdd"  class="btn btn-success" >Cập nhật Option Phụ kiện</button>
                
            </div>
        </div>

    </form>

    <script>
        $(document).ready(function() {
            // searchProductOption()
            // $("#id_product_option").change(function (e) {
            //    var price = getPriceProductOption($("#id_product_option").val());
            //    $('#real_price').html(price);
            // });
        });

    </script>

@endsection