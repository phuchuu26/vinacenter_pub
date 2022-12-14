@extends('admin.master')
@section('title','Thêm loại')
@section('content')
    <form action="{{ route('postVoucherAdd') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Voucher
                        </header>
                        <div class="panel-body mt-4">
                            <div class="position-center">

                                <div class="form-group">
                                    {{-- <select name="productOption" class="form-control">
                                        <option value="0">Chọn</option>
                                   
                                        @foreach($producOption as $option)

                                            <option  class="form-group mb-3"  value="{{ $option['id'] }}" {{ (old('productOption') == $option['id']) ? 'selected' : '' }}>
                                                {{$option['name'] }}
                                            </option>
                                
                                        @endforeach
                                    </select> --}}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="width: 150px">Sản phẩm áp dụng</span>
                                    </div>
                                    {{-- {{dd($producOption)}} --}}
                                    <select class="form-control" id="id_product_option" name="id_product_option" required>
                                        @foreach($producOption as $option)
                                            <option value="{!! $option['id']!!}"> {{$option['name'] }}</option>
                                        @endforeach
                                    </select>

                                    {{-- <input  style="width: 750px"class="form-control" name="mySelect2" type="hidden" id="mySelect2"> --}}


                                
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Voucher Code</span>
                                    </div>
                                    <input type="text" class="form-control" name="code" id="code" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Số tiền giảm giá</span>
                                    </div>
                                    <input type="number" class="form-control" name="amount_discount" id="amount_discount" required>
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

    <script>
        $(document).ready(function() {
            searchProductOption()
        });

    </script>
@endsection