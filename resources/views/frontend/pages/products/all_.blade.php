@extends('frontend.master')
@section('title','Trang sản phẩm')
@section('content')
<!-- end nav -->  
<link href="{!! asset('public/frontend/css/mycss.css') !!}" rel="stylesheet" type="text/css">
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <li class="home"> <a itemprop="url" href="/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
          <li> <strong> <span itemprop="title"> {!! $title !!} {!! $name1['name'] !!}</span> </strong> </li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'0-3tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 0 - 3tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'3tr-5tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 3tr - 5tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'5tr-7tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 5tr - 7tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'7tr-10tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 7 - 10tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'10tr-13tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 10 - 13tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'13tr-15tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 13 - 15tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'15tr-20tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> 15 - 20tr</a></li>
          <li>&nbsp&nbsp&nbsp<a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'tren-20tr']) !!}" class="list-group-item"><i class="fab fa-sistrix"></i> Trên 20tr</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<style type="text/css" media="screen">
 .row .l-mn{
    padding: 0px !important ;
    margin: 0px !important ;
    color: #009933;
    font-size: 12px;
    margin-left: 10px;
    font-weight: bold;
}
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
.detail p{
  text-align: left;
  padding-left: 5px;
}  
.my-list:hover .detail{top:0;}
div.round1 {
  border: 2px solid #CCCCCC;
  border-radius: 5px;
  height:25px;
}
</style>
  <div class="container" >
    
    <div class="row">
      <div>&nbsp</div>
      <div class="col-sm-12 col-lg-12 col-md-12">
        <div class="row">          
          <div class="col-sm-4"><i class="far fa-arrow-alt-circle-right"></i> <span style="font-weight: bold;color: #0098da;">{!! $name1['name'] !!}</span></div>
          <div class="col-sm-2"><i class="fas fa-angle-double-down"></i> 
            <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'tang-dan']) !!}" class="list-group-item">Giá tăng dần</a>
          </div>
          <div class="col-sm-2"><i class="fas fa-angle-double-up"></i> 
            <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'giam-dan']) !!}" class="list-group-item">Giá giảm dần</a>
          </div>
          <div class="col-sm-2"><i class="fas fa-list-ul"></i> 
            <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'a-z']) !!}" class="list-group-item">A <i class="fas fa-long-arrow-alt-right"></i> Z</a>
          </div>
          <div class="col-sm-2"><i class="fas fa-list-ul"></i> 
            <a class="l-mn" href="{!!route('getProductType',['alias' => $name['alias'],'p'=>'z-a']) !!}" class="list-group-item">Z <i class="fas fa-long-arrow-alt-right"></i> A</a>
          </div>         
        </div>
        <div class="row">    
          @foreach($data as $item)
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="my-list">
            <img src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}" alt="dsadas" />
            <h3>{{ str_limit($item['name'], $limit = 15, $end = '...') }}</h3>
            <span>Giá :</span>
            <span class="pull-right" style="color: red;font-weight: bold;font-family: tahoma;">{!! number_format($item['value']) !!} VND</span>            
            <div class="detail">            
            <div class="short-description"><p class="rte"> {!! str_limit($item['sumary'], $limit = 200, $end = '...') !!} </p></div>
            <a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="btn btn-info">Mua ngay</a>
            <a href="{!! url('san-pham/'.$item['alias']) !!}" class="btn btn-info">Chi tiết</a>
            </div>
          </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>    
  </div>
 
@endsection