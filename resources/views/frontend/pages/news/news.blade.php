@extends('frontend.master')
@section('title','Trang tin tức')
@section('content')  
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <li class="home"> <a itemprop="url" href="/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
          <li> <strong itemprop="title">Tin tức</strong> </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="blog-wrapper" id="main">
          <div class="site-content" id="primary">
            <div role="main" id="content">
              @foreach($news as $item)
              <div class="item">
                <div class="row">
                  <div class="col-md-5 col-sm-4"> 
                    <a href="{!! url('tin-tuc/'.$item['id'].'/'.$item['alias'].'.html') !!}" title="{!! $item['title'] !!}"> 
                      <img height="200px" class="blog-thumb" alt="{!! $item['title'] !!}" 
                      src="{!! asset('public/uploads/news/'.$item['image'])!!}"> 
                    </a> 
                  </div>
                  <div class="col-md-7 col-sm-8">
                    <h3 class="article_title"><a href="{!! url('tin-tuc/'.$item['id'].'/'.$item['alias'].'.html') !!}">{!! str_limit($item["title"], $limit = 115, $end = '...') !!}</a></h3>
                    <p class="article_published_time">
                      <time class="entry-date">{!! $item['created_at'] !!}</time>
                    </p>
                    <div>{!! str_replace('<h3>','',str_limit(strip_tags($item["description"]), $limit = 170, $end = '...')) !!}</div>
                    <button class="btn btn-viewmore" type="button" onClick="window.location.href='{!! url('tin-tuc/'.$item['id'].'/'.$item['alias'].'.html') !!}'">Xem thêm</button>
                  </div>
                </div>
              </div>              
              @endforeach
            </div><div id="paging_nav">{{ $news->render() }}</div>
          </div>
        </div>
      </div>
      <div class="col-right sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="blogs_hot mtblock mgbt30">
          <div class="block-title">
            <h2><a href="">Tin tức nổi bật</a></h2>
          </div>
          <div class="block-content">
            <table width="100%">
              @foreach($news->take(3) as $item)
              <tr valign="top" >
                <td width="40%"><img  alt="{!! $item['title'] !!}" 
                      src="{!! asset('public/uploads/news/'.$item['image'])!!}"> </td>
                 <td style="padding-left: 5px;"><div style="margin-bottom: 10px;">
                   <a href="{!! url('tin-tuc/'.$item['id'].'/'.$item['alias'].'.html') !!}"> {!! str_limit($item["title"], $limit = 55, $end = '...') !!}</a>
                 </br><span style="color:#BEBEBE ">{!! $item['created_at'] !!}</span>
                 </div>                  
                 </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
        
        <div class="blog_banner mtblock hidden-sm">
          <div class="block-title">
            <h2>Quảng cáo</h2>
          </div>
          <div class="block-content" style="text-align: center;"> <a target="_self" href="{!! url('tat-ca-san-pham') !!}" title=""> <img alt="vinacorp" src="{!! asset('public/uploads/banner/'.LoadStatics::getBannerNews()) !!}"> </a> </div>
        </div>
        <div class="mtblock">
          <div class="block-title">
            <h2>Kính chào</h2>
          </div>
          <div class="block-content"> Chào mừng quý khách tới với cửa hàng của chúng tôi. Hãy liên hệ theo địa chỉ cửa hàng ở bên để có thể được tư vấn và chăm sóc một cách tốt nhất. Xin cảm ơn. </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection    