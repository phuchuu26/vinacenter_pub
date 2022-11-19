<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="author" content="QuocTuan.Info"/>
  <link rel="stylesheet" href="{!! asset('public/vnc_admin/templates/css/style.css') !!}"/>
  <title>Quản trị thông tin Vinacenter :: Đăng ký</title>
  <style>
    /* .is-flex {
        display: flex!important;
    }
    .is-align-items-center {
        align-items: center!important;
    }
    #login-form .cps-login-form .line-through hr {
        background-color: #dbdbdb;
        width: 100%;
    }
    hr {
        border: none;
        display: block;
        height: 2px;
        margin: 1.5rem 0;
    } */

    .separator {
    /* margin-top: 100px; */
    text-align: right;
    position: relative;
}

.separator hr {
    position: absolute;
    z-index: 1;
    width: 87%;
}

.separator a {
    position: absolute;
    right: 235px!important;
    top: 7px;
    font-style: italic;
    background: #fff;
    z-index: 10;
    padding: 2px 20px;
}

.form_label {
    display: inline-block;
    width: 213px;
    margin: 3px;
    vertical-align: middle;
}

.textbox, .select {
    width: 208px;
    border: 1px solid silver;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
}


  </style>
</head>
<body>
<div id="layout">
  <div id="top">
    Quản trị thông tin Vinacenter :: Đăng ký
  </div>
  <div id="main">
    <form action="{{route('post_register')}}" method="POST" style="width: 650px; margin: 30px auto;">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <fieldset>
        <legend style="text-align : center">Đăng ký tài khoản VINACENTER</legend>
        <table>
            <tr>
                <td></td>
                <td colspan="2">
                    @include('admin.blocks.error')
                    @include('admin.blocks.flash')
                </td>
            </tr>
          <tr>
            <td class="login_img"></td>
            <td>
              

            <span class="form_label">Vui lòng nhập username / số điện thoại:
            </span>

            <span class="form_item">
				<input  value="{{ old('phone')  }}" type="text" name="phone" class="textbox" required/>
            </span>

              <br/>
            <span class="form_label">Vui lòng nhập địa chỉ email:</span>
            <span class="form_item">
              <input  value="{{ old('email')  }}" type="text" name="email" class="textbox" required/>
            </span><br/>


            <span class="form_label">Vui lòng nhập họ và tên:</span>
            <span class="form_item">
                <input  value="{{ old('name')  }}" type="name" name="name" class="textbox" required/>
            </span><br/>
   
            <span class="form_label">Nhập mật khẩu của bạn:</span>
            <span class="form_item">
                <input  type="password" name="password" class="textbox" required/>
            </span>
            <div style="margin-right: 61px;float: right" class="row des">
                <p style="font-size: 10px;
                color: red;" class="form_item description">Mật khẩu phải nhiều hơn 8 ký tự, ít nhất 1 chữ thường 1 chữ in hoa, 1 chữ số, 1 ký tự đặc biệt
                </p>
          
            </div>
            <br/>


            
            <span class="form_label">Xác nhận lại mật khẩu:</span>
            <span class="form_item">
                <input value="" type="password" name="password_confirmation" class="textbox" required/>
            </span>
            <br/>
            <br/>

            <input required id="insurance"  name="insurance" type="checkbox" >
            <label for="insurance" class="checkbox__text">
              Tôi đồng ý với các điều khoản bảo mật cá nhân
            </label>
            
            

            <br>
            
            <div  style="text-align : center!important;" class="a">

              <span class="a">
                <input type="submit" name="btnaLogin" value="Đăng ký" class="button"/>
              </span>
              
            </div>

            <br>
            <br>
      

            <div class="separator">
                <hr>
                <a >hoặc</a>
                <hr>
            
            </div>
            <br>
            <br>
            <br>

            <div class="row">
                <div style="max-width: 299px" class="col-md-6">
                  <a class="btn btn-outline-dark" href="{{ route('login.google') }}" role="button" style="text-transform:none; min-width: 433px">
                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="{{asset('/public/images/Google__G__Logo.svg.png')}}" />
                    Đăng nhập bằng tài khoản Google
                  </a>
                </div>
            </div>

            <br/>

            <div class="row">
                <div  class="col-md-6">
                  <a class="btn btn-outline-dark" href="{{ route('login.face') }}" role="button" style="text-transform:none; min-width: 433px">
                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="{{asset('/public/images/Facebook_f_logo_(2019).svg.png')}}" />
                    Đăng nhập bằng tài khoản Facebook
                  </a>
                </div>
            </div>
              

            {{-- <span class="form_item">
                <input type="submit" name="btnLogin" value="Đăng nhập" class="button"/>
                <a href="{{ route('login.google') }}" 
                    class="btn btn-secondary">{{ __('Google Sign in') }}</a>
            </span>
                            
                            
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button"/>
                                <a href="{{ route('login.face') }}" 
                                  class="btn btn-secondary">Dang nhap face</a>
                            </span> --}}

            </td>
          </tr>
        </table>
      </fieldset>
    </form>
  </div>
  <div id="bottom">
    Copyright © 2022 by Vinacenter
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{!! asset('public/vnc_admin/templates/js/myscript.js') !!}" type="text/javascript"
        charset="utf-8"></script>


        
<!-- Minified CSS and JS -->
<link   rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous">
</script>

</body>
</html>