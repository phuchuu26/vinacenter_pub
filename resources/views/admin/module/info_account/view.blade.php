

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
                        <h5>Cập nhật thông tin tài khoản</h5>
                    </div>
                    

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Họ tên</span>
                            </div>
                            <input type="text" name="name" class="form-control" value="{!! $user->name ?? old('name') !!}" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Số điện thoại</span>
                            </div>
                            <input type="text" name="str_phone" class="form-control" value="{!! $info_user->str_phone ?? old('str_phone') !!}" required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Email</span>
                            </div>
                            <input type="text" name="email" class="form-control" value="{!! $info_user->str_email ?? old('email') !!}" required/>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    
                    <div class="col-lg-12">  
                        <div class="input-group mb-3">
                            <p> &nbsp&nbsp&nbsp&nbsp Địa chỉ:</p> 
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Tỉnh</span>
                            </div>

                            <select class="form-control" id="province" name="province" required>
                                @foreach($provinces as $item)
                                    @if(  !empty($info_user->id_province) && $item['id_province'] == $info_user->id_province )
                                        <option value="{!! $item['id_province']!!}"
                                                selected="">{!! $item['str_province']!!}</option>
                                    @else
                                        <option value="{!! $item['id_province']!!}">{!! $item['str_province']!!}</option>
                                    @endif
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    
                   
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Quận, huyện</span>
                            </div>

                            <select class="form-control" id="district" name="district" required>
                                    @if(  !empty($info_user->id_district) && $item['id_district'] == $info_user->id_district )
                                        <option value="{!! $item['id_district']!!}"
                                                selected="">{!! $item['str_district']!!}</option>
                                    @else
                                        <option value=""></option>
                                    @endif
                            </select>
                            
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Phường, xã</span>
                            </div>

                            <select class="form-control" id="ward" name="ward" required>
                                    @if(  !empty($info_user->id_ward) && $item['id_ward'] == $info_user->id_ward )
                                        <option value="{!! $item['id_ward']!!}"
                                                selected="">{!! $item['str_ward']!!}</option>
                                    @else
                                        <option value=""></option>
                                    @endif
                            </select>
                            
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Số nhà</span>
                            </div>
                            <input type="text" name="str_address" class="form-control" value="{!! $info_user->str_address ?? old('str_address') !!}" required/>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    
                    <div class="col-lg-12">  
                        <div class="input-group mb-3">
                            <p> &nbsp&nbsp&nbsp&nbsp Tài khoản ngân hàng:</p> 
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Số tài khoản</span>
                            </div>
                            <input type="text" name="account_number" class="form-control" value="{!! $info_user->account_number ?? old('account_number') !!}" required/>
                        </div>
                    </div>

                    
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Tên chủ tài khoản</span>
                            </div>
                            <input type="text" name="account_name" class="form-control" value="{!! $info_user->account_name ?? old('account_name') !!}" required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Tên Ngân hàng</span>
                            </div>
                            <input type="text" name="bank_name" class="form-control" value="{!! $info_user->bank_name ?? old('bank_name') !!}" required/>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>

                    <div class="col-lg-12">  
                        <div class="input-group mb-3">
                            <p> &nbsp&nbsp&nbsp&nbsp Ví điện tử Momo:</p> 
                        </div>
                    </div>

                    
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="width: 150px">Số điện thoại</span>
                            </div>
                            <input type="text" name="str_wallet_momo" class="form-control" value="{!! $info_user->str_wallet_momo ?? old('str_wallet_momo') !!}" required/>
                        </div>
                    </div>

                
                    <div class="col-lg-12">
                        <input type="submit" name="btnUserAdd" value="Cập nhật thông tin" class="btn btn-success pull-right"/>
                    </div>
                </div>
            </form>
        </div>
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
@endsection