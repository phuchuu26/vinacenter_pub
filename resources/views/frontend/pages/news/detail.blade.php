@extends('frontend.master')
@section('title',$data['title'])
@section('content')
  <!-- end nav --> 
  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <li class="home"> <a itemprop="url" href="/" title="Trang chủ"> <span itemprop="title">Trang chủ</span> </a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </li>
            <li> <a itemprop="url" href="{!! route('getNewsIndex') !!}"> <span itemprop="title">Tin tức</span> </a> </li>            
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
                <article class="blog_entry clearfix">
                  <header class="blog_entry-header clearfix">
                    <div class="blog_entry-header-inner">
                      <h1 class="blog_entry-title">{!! $data['title'] !!}</h1>
                    </div>
                    <!--blog_entry-header-inner-->
                  </header>
                  <!--blog_entry-header clearfix-->
                  <div class="entry-content">
                    <div class="entry-content rte">
                      {!! $data['description'] !!}                      
                    </div>
                  </div>
                  <footer class="entry-meta"> Được đăng vào 
                    <time class="entry-date">{!! $data['created_at'] !!}</time>
                  </footer>
                </article>
                <!--comment FB-->  
                <div id="fb-root"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=196188007488872";
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>
                  <div class="fb-comments" data-href="{!! LoadStatics::getFullUrl() !!}" data-numposts="5"></div>           
              </div>
              <!--end comment FB-->
            </div>
          </div>
        </div>
        <div class="col-right sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="blogs_hot mtblock mgbt30">
            <div class="block-title">
              <h2><a href="tintuc.html">Tin tức nổi bật</a></h2>
            </div>
            <div class="block-content">
              <table width="100%">
              @foreach($news as $item)
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
            <div class="block-content" style="text-align: center;"> <a target="_self" href="../Sanpham/sanpham.html" title=""> <img alt="vinacorp" src="{!! asset('public/uploads/banner/'.LoadStatics::getBannerNews()) !!}"> </a> </div>
          </div>
          <div class="blog_sharing mtblock">
            <div class="block-title">
              <h2>Chia sẻ bài viết</h2>
            </div>
            <div class="block-content"> <a href="http://www.facebook.com/sharer.php?u=PlayStation%20Now%20s%E1%BA%BD%20stream%20th%C3%AAm%20game%20PS4,%20ch%C6%A1i%20game%20PS4%20tr%C3%AAn%20PC" data-toggle="tooltip" title="Facebook" target="_blank"><i class="fa fa-facebook-square"></i></a> <a target="_blank" data-toggle="tooltip" title="Google-plus" href="https://plus.google.com/share?url=/bai-viet-mau-3"><i class="fa fa-google-plus"></i></a> <a href="http://twitter.com/share?text=PlayStation%20Now%20s%E1%BA%BD%20stream%20th%C3%AAm%20game%20PS4,%20ch%C6%A1i%20game%20PS4%20tr%C3%AAn%20PC&amp;url=/bai-viet-mau-3" target="_blank" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter-square"></i></a> </div>
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