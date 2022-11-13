<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="author" content="QuocTuan.Info"/>
  <link rel="stylesheet" href="{!! asset('public/vnc_admin/templates/css/style.css') !!}"/>
  <title>Quản trị thông tin Vinacenter :: Đăng nhập</title>
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
                                <a href="{{ route('login.google') }}" 
                                  class="btn btn-secondary">{{ __('Google Sign in') }}</a>
                            </span>
                            
                            
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button"/>
                                <a href="{{ route('login.face') }}" 
                                  class="btn btn-secondary">Dang nhap face</a>
                            </span>
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
</body>
</html>