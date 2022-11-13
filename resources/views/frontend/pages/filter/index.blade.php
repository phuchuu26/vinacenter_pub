@extends('frontend.master')
@section('title','Vina Center')
@section('content')
<style>
#myCarousel {
    margin: 0px !important;
}
#add img{
    padding-top:15px;
}



img{max-width:100%;}
  *{transition: all .5s ease;-moz-transition: all .5s ease;-webkit-transition: all .5s ease}
.my-list {
    width: 100%;
    padding: 10px;
    border: 1px solid #f5efef;
    float: left;
    margin: 15px 0;
    border-radius: 5px;
    box-shadow: 2px 3px 0px #e4d8d8;
    position:relative;
    overflow:hidden;
}
.my-list h3{
    text-align: left;
    font-size: 14px;
    font-weight: 500;
    line-height: 21px;
    margin: 0px;
    padding: 0px;
    border-bottom: 1px solid #ccc4c4;
    margin-bottom: 5px;
    padding-bottom: 5px;
    }
  .my-list span{float:left;font-weight: bold;}
  .my-list span:last-child{float:right;}
  .my-list .offer{
    width: 100%;
    float: left;
    margin: 5px 0;
    border-top: 1px solid #ccc4c4;
    margin-top: 5px;
    padding-top: 5px;
    color: #afadad;
    }
  .detail {
    position: absolute;
    top: -100%;
    left: 0;
    text-align: center;
    background: #fff;height: 100%;width:100%;
  
}
  
.my-list:hover .detail{top:0;}
div.round1 {
  border: 2px solid #CCCCCC;
  border-radius: 5px;
  height:25px;
}

</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--slider--->
<div class="container">
<div style="padding-top: 5px;">	
	<i class="fab fa-sistrix"></i> 
	
  
  <span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;"> 
    @if($color == 1) 
    <a style="color: blue; href="{!! route('get1Filter') !!}"> Dưới 3 triệu</a>
    @else
    <a href="{!! route('get1Filter') !!}"> Dưới 3 triệu</a>
    @endif
  </span>

	<i class="fab fa-sistrix"></i>
	<span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;">
    @if($color == 2) 
    <a style="color: blue; href="{!! route('get2Filter') !!}"> Từ 3 triệu đến 5 triệu</a>
    @else
    <a href="{!! route('get2Filter') !!}"> Từ 3 triệu đến 5 triệu</a>
    @endif
  </span>

	<i class="fab fa-sistrix"></i>
	<span style="color: black;font-family: tahoma;font-weight: bold;padding-right: 5px;">
    @if($color == 3) 
    <a style="color: blue; href="{!! route('get3Filter') !!}"> Trên 5 triệu</a>
    @else
    <a href="{!! route('get3Filter') !!}"> Trên 5 triệu</a>
    @endif
  </span>
</div>
 
<div class="container">
  <div class="row">
    
    @foreach($data as $item)

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="my-list">
      <img src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}" alt="dsadas" />
      <h3>{!!$item['name']!!}</h3>
      <span>Giá :</span>
      <span class="pull-right" style="color: red;font-weight: bold;font-family: tahoma;">{!! number_format($item['value']) !!} VND</span>
      <div class="offer">CÔNG TY TNHH TÍCH HỢP HỆ THỐNG VINA</div>
      <div class="detail">
      
      <p>{!!$item['sumary']!!} </p>
      <a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="btn btn-info">Mua ngay</a>
      <a href="{!! url('san-pham/'.$item['alias']) !!}" class="btn btn-info">Chi tiết</a>
      </div>
    </div>
    </div>
    @endforeach
        </div>
      </div>    
  
</div>

</section>
@endsection