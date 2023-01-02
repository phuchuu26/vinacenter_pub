@extends('admin.master')
@section('title','Thêm mới Option màu sắc')
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
            <h5>Thêm mới Option màu sắc</h5>
        </div>

        <div class="panel panel-default">
            <table class="table">
                <tbody>

                    <form action="{{ route('postAddColorDetail', ['id' =>  $productoption->id ])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
      
                <tr class="cus_det_order">
                    <td width="100%">
                        Thông tin hạng mục:
                    </td>

                    <td width="100%">
                        <div class="row">
                            
                            <div class="col-lg-3">
                            </div>   
                            <div class="col-lg-6">
                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 170px">
                                            Chọn màu:</span>
                                    </div>
                                    
                                    <select id="id_color" name="id_color"  class="form-control">

                                        @foreach ($color as $c)
                                           <option value="{{$c['id_color']}}">{{ $c['name_color'] }}</option>
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
                                    <input required min="{{$productoption->value}}" type="number" name="value" id="value" placeholder="Nhập đơn giá" class="form-control" value="{{ 
                                    trim($productoption->value) }}" />

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
                <button style="float: right!important;" type="submit" name="btnNewsAdd"  class="btn btn-success" >Thêm Option màu sắc</button>
                
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