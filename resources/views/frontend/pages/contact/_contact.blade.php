@extends('frontend.master')
@section('title','Trang giới thiệu')
@section('content')
  <!-- end nav -->  
  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <li class="home"> <a itemprop="url" href="http://vinacorp.net/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
            <li> <strong itemprop="title">Liên hệ</strong> </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="main-container col2-right-layout">
    <div class="main container">      
      <div class="row">
        <section class="col-main  col-md-9 col-sm-8  col-xs-12">
          <form action="" method="POST" accept-charset="utf-8">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">          
            @include('frontend.pages.errors.error')
            @include('admin.blocks.flash')          
          <div class="page-title">
            <h1>Liên hệ</h1>
          </div>
          <div class="static-contain">
            <form accept-charset="UTF-8" action="/contact" id="contact" method="post">
              <input name="FormType" value="contact" type="hidden">
              <input name="utf8" value="true" type="hidden">
              <fieldset class="group-select">
              <div class="customer-name row">
                <div class="input-box col-md-6">
                  <label> Họ và tên: <span class="required">*</span></label>
                  <br>
                  <input name="txtName" id="txtName" class="input-text " type="text" value="{!! old('txtName') !!}" style="color: black;">
                </div>
                <div class="input-box col-md-6">
                  <label> Email: <span class="required">*</span> </label>
                  <br>
                  <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="input-text" name="txtEmail" id="txtEmail" type="text" value="{!! old('txtEmail') !!}" style="color: black;">
                </div>
              </div>
              <label for="comment">Nội dung: <em class="required">*</em></label>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <textarea name="txtContent" id="txtContent" style="color: black;" rows="3">{!! old('txtContent') !!}</textarea>
                </div>
              </div>
              <div class="buttons-set">
                <button type="submit" title="Gửi" class="button btn-accent submit"> <span> Gửi </span> </button>
              </div>
              </fieldset>
            </form>
          </div>
        </section>
        </form>
        <aside class="col-right sidebar col-md-3 col-sm-4 col-xs-12">
          <div class="block block-company">
            <div class="block-title">Thông tin </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
                <li class="item"><a href="/">Trang chủ</a></li>
                <li class="item"><a href="{!! route('getProductAll') !!}">Sản phẩm</a></li>
                <li class="item"><a href="{!! route('getNewsIndex') !!}">Blog</a></li>
                <li class="item"><a href="{!! route('getIntroIndex') !!}">Giới thiệu</a></li>
                <li class="item"><a href="{!! route('getBuyIndex') !!}">Hướng dẫn mua hàng</a></li> 
                <li class="item"><a href="{!! route('getOrderIndex') !!}">Hướng dẫn thanh toán</a></li>                
              </ol>
            </div>
          </div>
        </aside>
      </div>
      <div class="row">
         <section class="col-md-3">              
           {!! $data['value'] !!}      
         </section>
         <section class="col-md-9"><!--map here -->  
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7297413866004!2d106.76733031472959!3d10.831982261127905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527aa66a8cf29%3A0x70404d38bf5024e!2zMzhBIMSQxrDhu51uZyBz4buRIDYx!5e0!3m2!1svi!2s!4v1519869097841" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></section><!--end map here -->  
      </div>    
    </div>
  </div>
  <!--End main-container -->
   @endsection