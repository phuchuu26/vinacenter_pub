

@extends('admin.master')
@section('title','Cập nhật thông tin tài khoản')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <form action="{{route('login.update_info_user')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
                {{-- @if(Session::has('flash_level'))
                    <div class="alert {!! Session::get('flash_level') !!} ">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {!! Session::get('flash_message') !!}
                    </div>
                @endif --}}

                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="error_msg">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                {{-- <div class="alert alert-danger">Vui lòng cập nhật thông tin đầy đủ!</div> --}}
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h5>Thống kê bán hàng</h5>
                    </div>
                    

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 250px">Nhân viên bán hàng nhiều nhất</span>
                            </div>
                            <p class="form-control">
                                <a href="{{route('getUserView', ['id' =>  data_get( $data['best_saler'], 'id') ])}}">        {{ data_get( $data['best_saler'], 'name')   }}</a>
                         ( danh thu {!! number_format(  (int) data_get( $data['best_saler'], 'sale') ) .' đ )' !!} </p>
                            {{-- <input type="text" name="name" class="form-control" 
                            value=" {{ data_get( $data['best_saler'], 'user_id')   }} ( danh thu {!! number_format(  (int) data_get( $data['best_saler'], 'sale') ) .' đ )' !!}" required/> --}}
                        </div>
                    </div>
                   
                   
                    <div class="col-lg-12"> 
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 250px">Sản phẩm bán nhiều nhất</span>
                            </div>
                            <p  class="form-control" >
                                {{ data_get( $data['product_sale'], 'name')   }} ( số lượng {{ data_get( $data['product_sale'], 'qty')   }} cái) 
                            </p>
                        </div>
                    </div>
                   

                    <br>
                    <br>
                    <br>
              

                    
                    <div class="col-lg-12">  
                        <div class="input-group mb-3">
                            <p> &nbsp&nbsp&nbsp&nbsp Tổng doanh thu:</p> 
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 250px">Của tuần</span>
                            </div>
                            <p  class="form-control" >
                                {!! number_format(  (int) data_get( $data['sale']['week'], 'sale') ) .' đ' !!}
                            </p>
                        </div>
                    </div>

                    
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 250px">Của tháng</span>
                            </div>
                            <p  class="form-control" >
                                {!! number_format(  (int) data_get( $data['sale']['month'], 'sale') ) .' đ' !!}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 250px">Của năm</span>
                            </div>
                            <p  class="form-control" >
                                {!! number_format(  (int) data_get( $data['sale']['year'], 'sale') ) .' đ' !!}
                            </p>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>

               

                
               
                </div>
            </form>
        </div>
    </div>

    <script>
         var option_districs = $('#district');
         var option_wards = $('#ward');

        $( "input" ).prop( "disabled", true );
        $( "select" ).prop( "disabled", true );
       
        
    </script>
@endsection