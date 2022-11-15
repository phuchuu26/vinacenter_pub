<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="author" content="QuocTuan.Info"/>
  <link rel="stylesheet" href="{!! asset('public/vnc_admin/templates/css/style.css') !!}"/>
  <title>Quản trị thông tin Vinacenter :: Đăng nhập</title>
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
    width: 100%;
}

.separator a {
    position: absolute;
    right: 185px;
    top: 7px;
    font-style: italic;
    background: #fff;
    z-index: 10;
    padding: 2px 20px;
}



  </style>
</head>
<body>
<div id="layout">
  <div id="top">
    Quản trị thông tin Vinacenter :: Đăng nhập
  </div>
  <div id="main">

    <form action="" method="POST" style="width: 650px; margin: 30px auto;">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <fieldset>
        <legend>Thông Tin Đăng Nhập</legend>
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

            <span class="form_label">User name:</span>
            <span class="form_item">
                            <input type="text" name="txtUser" class="textbox"/>
                        </span><br/>
            <span class="form_label">Password:</span>
            <span class="form_item">
                            <input type="password" name="txtPass" class="textbox"/>
                        </span><br/>
            <span class="form_label"></span>
        
            <span class="form_item">
                <input type="submit" name="btnLogin" value="Đăng nhập" class="button"/>
            </span>
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