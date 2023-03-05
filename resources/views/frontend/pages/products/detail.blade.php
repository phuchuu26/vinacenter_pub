@extends('frontend.master')
@section('title',$data['name'])
@section('description',strip_tags($data['sumary']))
@section('image',$data['image'])
@section('content')
  <!--Start main-container -->
  <head>
	<style>
		img.colorpick-eyedropper-input-trigger {
			display: none;
		}
		.col-sm-8.rating_com {
			border-radius: 21px;
			margin-bottom: 8px;
			background-color: #f5f5f5;
		}
		.delete_rating:hover {
			background-color: red!important;
			color: white!important;
		}

		label {
			max-height: 30px;
		}

    .flexslider .slides img {
        max-height: 500px;
    }

  

input[type="radio"] {
	/* position: absolute;
  height: 20px;
  width: 50px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center; */
  /* z-index: 0 */
  display: none;
}
input[type="radio"]:checked + label {
    border: 2px solid red;
}

input[type="radio"]:checked + label {
    border: 2px solid red;
}

input[type="checkbox"] {
	/* position: absolute;
  height: 20px;
  width: 50px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center; */
  /* z-index: 0 */
  display: none;
}

input[type="checkbox"]:checked + label {
    border: 2px solid red;
}

input[type="checkbox"]:checked + label {
    border: 2px solid red;
}



	</style>
  </head>

  <section class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <li class="home">
              <a itemprop="url" href="/" title="Trang chủ">
                <span itemprop="title" style="color:#00CC99;">Trang chủ</span> </a>
              <i class="fas fa-caret-right"></i>
            </li>
            @if(isset($dataCateId['name']))
              <li>
                <a itemprop="url" href="#">
                  <span itemprop="title" style="color:#00CC99;">{!! $dataCateId['name'] !!}</span>
                </a>
                <i class="fas fa-caret-right"></i>
              </li>
            @endif
            @if(isset($dataCate['name']))
              <li>
                <a itemprop="url" href="#">
                  <span itemprop="title" style="color:#00CC99;">{!! $dataCate['name'] !!}</span>
                </a>

              </li>
            @endif

          </ul>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container" style="padding-top: 0px;margin-top: 0px;">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
          <h3 itemprop="name"><i class="fas fa-cart-arrow-down"></i> {!! $data['name'] !!}</h3>
		  
		 	@if($data->ratings->count() > 0)
				<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-show-caption="false" data-step="0.1" value="{{ $data->averageRating }}" data-size="xs" disabled=""> 
				{{-- | Đánh giá --}}
				<span class="review-no">
				<p>
					{{ $data->ratings->count() }} lượt đánh giá
				</p>
				</span>
			@endif

		</div>
        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="float: right;">
          <div class="share mb-4">
            <table>
              <tbody>
              <tr>
                <td style="width: 30%">
                  <div class="fb-like" data-href="{!! LoadStatics::getFullUrl() !!}" data-layout="button_count"
                       data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                  <div id="fb-root"></div>
                  <script>(function (d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s);
                          js.id = id;
                          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
                          fjs.parentNode.insertBefore(js, fjs);
                      }(document, 'script', 'facebook-jssdk'));</script>
                </td>
                <td valign="middle">
                  <script src="https://apis.google.com/js/platform.js" async defer>{
                          lang: 'vi'
                      }</script>
                  <div class="g-plusone" data-href="{!! LoadStatics::getFullUrl() !!}"></div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>



  <div class="container">
    <div class="row">
      <div class="product-essential">
        <div class="product-img-box col-lg-5 col-sm-5 col-md-5 col-xs-12">
          <div class="product-image">
            <div class="large-image">
              <div class="flexslider">
                <ul class="slides">
                  @foreach($productImg as $item)
                    <li data-thumb="{!!asset('public/uploads/products/'.$item['path']) !!}">
                      <img src="{!!asset('public/uploads/products/'.$item['path']) !!}" alt="{!! $item['path'] !!}"/>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="product-shop col-lg-4 col-sm-4 col-xs-12">
          @if($total > 0)
            <p class="availability in-stock">
              <span>Còn {{$total}} sản phẩm</span>
            </p>
          @else
            <p class="availability in-stock">
              <span>Hết hàng</span>
            </p>
          @endif
          <div class="price-box">
    	<span class="special-price">
			
			<input hidden type="text"  value="{{$data['value']}}"  id="default_price" >


    		<span  id="default_price_show" class="price">{!! number_format($data['value']) !!}
    	</span>
		<span  id="default_price_show" class="price">₫
    	</span>
    	</span>
            <span class="old-price">
    		<span class="price" style="display: none;"> </span>
    	</span>
          </div>
          <div class="short-description">
            <p class="rte"> {!! $data['sumary'] !!} </p>
          </div> 
        @if(count($group_color) > 0)
          
          <div class="short-description">
              <p id="color_des" class="rte">
                Nhóm màu :		
              </p>
          </div>
		  <input hidden type="number"  value='0' id="sub_price_color">
      
            <p id="color_error" style="display: none;color: red; " class="rte">
              Vui lòng chọn màu sản phẩm	
            </p>

			@foreach ($group_color as $detailColor)
	
			

				<label class="label_color">
					@php
            $co = $detailColor->color;
						$color_picker = data_get($co, 'color_picker');
						$id_color = data_get($co, 'id_color');
					@endphp

				
					
					<input  class="test" value="{!! $color_picker !!}" color_name="{!! data_get($co, 'name_color') !!}" for="{!! $color_picker !!}" type="radio" name="color"
					id_color="{!!  data_get($detailColor, 'id_color_detail') !!}" id="{!! $color_picker !!}" value="{{ $id_color }}" sub_price="{!!  data_get($detailColor, 'value') !!}">

					<label class="a">
						<input type="color" id="" name="color_picker"  class="color_picker" disabled value="{!! $color_picker !!}"><br><br>    
					</label>
					
				</label>
			@endforeach 

		@endif

		
	

		@if(count($group_accessory) > 0)

		
		<div class="short-description">
			<p id="accessory_des" class="rte">Phụ kiện :		
			</p>
		</div>

		<p id="accessory_error" style="display: none;color: red; " class="rte">
			Vui lòng chọn phụ kiện đi kèm	
		</p>

    	<input hidden type="number"  value='0' id="sub_price_accessory">

		@foreach ($group_accessory as $key => $detailAccessory)
			@php
				$acc = $detailAccessory->accessory;
			@endphp

			<label class="label_accessory">
				<input  class="checkbox_{!! data_get($acc, 'id_accessory') !!}" value="{!! data_get($acc, 'id_accessory') !!}" name_accessory="{!! data_get($acc, 'name_accessory') !!}"
         type="checkbox" name="accessory[]"
				id_accessory="{!! data_get($detailAccessory, 'id_accessory_detail') !!}"
				id="{!! data_get($acc, 'id_accessory') !!}" value="{{data_get($acc, 'id_accessory')}}"
				sub_price="{!!  data_get($detailAccessory, 'value') !!}"
				>

        <label for="{!! data_get($acc, 'id_accessory') !!}" class="">
					<input style="min-height: 29px;" type="text" name="checkbox_{!! data_get($acc, 'id_accessory') !!}"  class="" disabled value="{!! data_get($acc, 'name_accessory') !!}"><br><br>    
				</label>
				
			</label>

		@endforeach 
{{-- 
    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
    <label for="vehicle1"> I have a bike</label><br>
    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
    <label for="vehicle2"> I have a car</label><br>
    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
    <label for="vehicle3"> I have a boat</label><br> --}}
	@endif


    
        
          @if($total > 0)
		 
            <div class="add-to-box">
              <div class="add-to-cart-real">
				
				<input hidden value="{!! url('mua-hang',[$data["id"],$data["alias"]]) !!}" id="route_mua_hang" type="text">
                <button id="mua-hang"  readonly class="btn btn-info"
                   role="button"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>


				<input hidden value="{!! url('mua-ngay',[$data["id"],$data["alias"]]) !!}" id="route_mua_ngay" type="text">
				<button id="mua-ngay"  class="btn btn-danger" role="button"><i
				class="fas  "></i> Mua ngay</button>

                <div class="share">
                  <table>
                    <tbody>
                    <tr>
                      <td style="width: 30%; color: #444444;">
                        <!--<span style="color: #000000;font-weight: bold;">QUÀ TẶNG MUA CÙNG SẢN PHẨM:  </span>
                        <span style="color: #444444;"></br><a href="http://vinacenter.vn" target="_blank">- Miễn phí vận chuyển cho đơn hàng trên 1.000.000 vnđ</a></span>-->
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 30%; color: #444444;"> - Gọi đặt mua:
                      <span style="color: #036;font-weight: bold;">{!! LoadStatics::getPhone()  !!}</span> (Thời gian:
                      8h:00 - 18h:00 thứ 2 đến thứ 7) or Zalo: <span style="color: #036;font-weight: bold;">093.77.77.638 </span></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          @endif
          <br>

        </div>
        <div class="col-right sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding: 0px;">


          <div class="well well-sm">
            <span style="font-weight: bold;">Chính sách bán hàng <i class="fas fa-box-open"></i><br></span>
            <span>{!! $data['saleoff'] !!}</span>
          </div>

        </div>
        <div class="product-collateral">
          <div class="col-sm-12">
            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
              <li class="active"><a href="#product_tabs_description" data-toggle="tab"> Mô tả sản phẩm </a></li>
              <!--<li> <a href="#product_tabs_custom" data-toggle="tab">Thông tin thanh toán</a> </li>
              <li> <a href="#product_tabs_custom1" data-toggle="tab">Hướng dẫn mua hàng</a> </li>-->
            </ul>
            <div id="productTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="product_tabs_description">
                <div class="std rte">
                  {!! $dataPro['description'] !!}
                </div>
              </div>
              <div class="tab-pane fade" id="product_tabs_custom">
                <div class="product-tabs-content-inner clearfix"> {!! $dataOrder['value'] !!}</div>
              </div>
              <div class="tab-pane fade" id="product_tabs_custom1">
                <div class="product-tabs-content-inner clearfix"> {!! $dataBuy['value'] !!}</div>
              </div>
            </div>
          </div>


          <div class="fb-comments" data-href="{{url()->current()}}" data-width="" data-numdatas="5"></div>

     
		  <div class="index-large col-lg-12 col-md-8 col-sm-12 col-xs-12">
			  <section class="main-container col1-layout home-content-container">
				<br>
			
				<div class="new_title center">
					<h2>ĐÁNH GIÁ SẢN PHẨM</h2>
					<a href="#"></a></div>
					<td colspan="2">
						@include('admin.blocks.error')
						@include('admin.blocks.flash')
					</td>
					
				<form action="{{ route('posts.post') }}" method="POST">

					{{ csrf_field() }}
		{{-- {{dd( $data->ratings)}} --}}

					<div class="rating">

						<input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $data->userAverageRating }}" data-size="xs">

						<input type="hidden" name="id" required="" value="{{ $data->id }}">

						<textarea  rows="4" cols="11" placeholder="Hãy chia sẻ những điều bạn thích về sản phẩm này với những người mua khác nhé." 
						id="review" name="review">
							
						</textarea>
						
						{{-- <span class="review-no">{{ $data->ratings->groupBy('user_id')->count('user_id') }} lượt đánh giá</span> --}}
						{{-- <span class="review-no">{{ $data->ratings->count() }} lượt đánh giá</span> --}}

						<br/>
						<br/>

						<button class="btn btn-success">Đánh giá</button>
					</div>
				</form>
				<hr>	
<br>
				@if (!empty($data->ratings))

					@foreach ($data->ratings as $rating )
        
						<div class="col-sm-8 rating_com">
							<div class="a">
							<ul id="ratings_comment" class="nav nav-tabs">
									@if (!empty($rating->user))
										<li style="margin-left: -14px;" class="active"><a href="#product_tabs_description" data-toggle="tab">{{ $rating->user->name }}</a></li>
									@else
										<li style="margin-left: -14px;" class="active"><a href="#product_tabs_description" data-toggle="tab">GUEST</a>
										</li>
									@endif

									@if (\Auth::check() && \Auth::user()->role == 1)
										<li style="margin-left: auto;" class="">
											<a style="margin-left: auto;" class="delete_rating" href="{{route('delete.post', ['id_rating' => $rating->id])}}">
												<i class="fa fa-trash" aria-hidden="true">

												</i>
												Xóa đánh giá
											</a>
										</li>
									@endif

								</ul>
								
							</div>
							<div id="productTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="product_tabs_description">
								<div class="std rte">
									<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-show-caption="false" data-step="0.1" value="{{ $rating->rating }}" data-size="xs" disabled="">
									<span class="review-no">{{$rating->created_at}}</span>
								</div>
								<div class="std rte">
									<h5>{!! $rating->review !!}</span>
								</div>

							</div>
						
						
							</div>
						</div>

					@endforeach
					
				@endif
				

			</section>
			<br>
		
		
		</div>
	
	
	
		
		<div class="index-large col-lg-12 col-md-8 col-sm-12 col-xs-12">
			<hr>
            <section class="main-container col1-layout home-content-container">
              <div class="slider-items-products">
                <div class="new_title center">
                  <h2>Sản phẩm cùng loại</h2>
                  <a href="#"></a></div>
                <div class="block-content bgtrans pdbtt15">
                  <div id="owl_new_products"> @foreach($product as $item)
                      <div class="item">
                        <div class="col-item">
                          <div class="product-image-area"><a class="product-image" title="{!!$item['name']!!}"
                                                             href="{!! url('san-pham/'.$item['alias']) !!}"> <img
                                  src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}"
                                  alt="{!!$item['name']!!}" width="240" height="240"/> </a></div>
                          <div class="info">
                            <div class="info-inner">
                              <div class="item-title">
                                <h3 class="product_name"><a title="{!!$item['name']!!}"
                                                            href="{!! url('san-pham/'.$item['product_id'].'/'.$item['id'].'/'.$item['alias']) !!}"> {!!$item['name']!!} </a>
                                </h3>
                              </div>
                              <div class="item-content">
                                <div class="price-box"><span class="special-price"> <span class="price">{!! number_format($item['value']) !!}₫</span> </span>
                                </div>
                              </div>
                            </div>
                            <div class="actions">
                              <a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" title="">
                                <button class="btn-buy btn-accent btn-cart btn btn_buy" title="Mua hàng">
                                  <span>Mua hàng</span></button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach </div>
                </div>
              </div>
            </section>
            <!--End main-container -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">

var price = 0;

$("#review").val("");

$('.label_color').click(function(){
	$('input[name="color"]').prop('checked', false);
	$(this).find('input[name="color"]').prop('checked', true);
	let color_des = $(this).find('input[type="radio"]').attr("color_name");
	let id_color = $(this).find('input[type="radio"]').attr("id_color");
	let sub_price = $(this).find('input[type="radio"]').attr("sub_price");
	
	$("#sub_price_color").val(sub_price);
	


	// console.log(sub_price, price)
	$("#color_des").html(`Nhóm màu : ${color_des}`);
	$('input[name="color"]').val(id_color);

	sumSubPrice()

});

function sumSubPrice()
{
	var sub_price_color = $("#sub_price_color").val();
	var sub_price_accessory = $("#sub_price_accessory").val();
 
  if(typeof  sub_price_color == 'undefined'){
    sub_price_color = 0
  }
  if(typeof  sub_price_accessory == 'undefined'){
    sub_price_accessory = 0
  }

	var default_price = $("#default_price").val();
	total = parseInt(sub_price_color) + parseInt(sub_price_accessory) + parseInt(default_price)
	total = total.toLocaleString('en-US') 
	$('#default_price_show').html(	total )

}


$('.label_accessory').click(function(){

	// $('input[name="accessory"]').prop('checked', false);
  // console.log($(this).find('input[type="checkbox"]').prop('checked'));

	$(this).find('input[name="accessory[]"]').prop('checked', !$(this).find('input[type="checkbox"]').prop('checked'));

	
  $("#sub_price_accessory").val(0);
  var name_accessory = '';
  var length = $("input:checkbox[name='accessory[]']:checked").length;
  // console.log(length)
  if(length == 0){
    $("#accessory_des").html(`Phụ kiện : `);
  }
    $("input:checkbox[name='accessory[]']:checked").each(function(key, value){
        
        // console.log($(this).val());
        name_accessory_sub =  $(value).attr("name_accessory");
        // console.log( key, value, $(value).attr("name_accessory"), name_accessory_sub)
        var isLastElement = key == $("input:checkbox[name='accessory[]']:checked").length -1;
        // if (key != 0) {
        //    console.log(2)
        //     name_accessory = name_accessory + ', ' + $(value).attr("name_accessory") ;    
        // }
        // else if(key == 0)(
        //     name_accessory = $(value).attr("name_accessory") ;    
        //     // name_accessory =  name_accessory_sub; 
        //     console.log(1)
        // )

        if (key != 0) {
          // console.log(2)
          name_accessory =  name_accessory + ', ' ;    
        }
        name_accessory = name_accessory + $(value).attr("name_accessory") ;    

        // if(isLastElement){
        //     name_accessory = name_accessory + '.';
        // }


        
        let id_accessory = $(value).attr("id_accessory");
        let sub_price = parseInt($(value).attr("sub_price"));
        let sub_price_accessory = parseInt($("#sub_price_accessory").val());

        // let sub_price = $(this).find('input[type="checkbox"]').attr("sub_price");
        // console.log(name_accessory, id_accessory, sub_price, sub_price_accessory, parseInt(sub_price + sub_price_accessory))
        $("#sub_price_accessory").val(sub_price_accessory + sub_price);

        $("#accessory_des").html(`Phụ kiện : ${name_accessory}`);
        // $('input[name="accessory"]').val(id_accessory);
  });


	sumSubPrice()

});


    // $("#input-id").rating();
var mua_hang_path  = $('#route_mua_hang').val();
var route_mua_ngay  = $('#route_mua_ngay').val();
	// mua-hang
	$( document ).ready(function() {
		// Handler for .ready() called.

		$( 'input[name="accessory"]' ).prop( "checked", false );
    
		$( "#mua-hang" ).click(function() {
      // console.log($( 'input[name="accessory"]' ), $('input[name="accessory"]').val(),
      // $('input[name=accessory]:checked').val()
      // )
			if(!$('input[name="color"]').is(':checked')  && $('input[name="color"]').length > 0 ) { 
				
				$("#color_error").css({"display": "block"});
				return;
			}

			// if(!$('input[name="accessory"]').is(':checked') && $('input[name="accessory"]').length > 0) { 
				
			// 	$("#accessory_error").css({"display": "block"});
			// 	return;
			// }

			let id_color = '';
      let id_accessory = [];
			
			if($('input[name="color"]').length > 0){
				id_color = $('input[name="color"]').val();
			}
			
			// if($('input[name="accessory"]').length > 0){
			// 	id_accessory =  $('input[name=accessory]:checked').val();
      //   if(id_accessory == undefined){
      //     id_accessory = '';
      //   }
			// 	// id_accessory = $('input[name="accessory"]').val();
			// }

      var length_accessory =  $("input:checkbox[name='accessory[]']:checked").length;
			if( length_accessory > 0){
				// id_accessory = $('input[name="accessory"]').val();
        // id_accessory =  $("input:checkbox[name='accessory[]']:checked").val();
        $("input:checkbox[name='accessory[]']:checked").each(function(key, value){
          // id_accessory[] = $(value).attr("id_accessory");
          id_accessory.push($(value).attr("id_accessory"));
        });

          if(id_accessory == undefined){
            id_accessory = '';
          }
        }

        id_accessory = encodeURIComponent(JSON.stringify(id_accessory));

			
			window.location.href = mua_hang_path + '?id_color=' + id_color + '&id_accessory=' + id_accessory
			// $.ajax({
            //     url: mua_hang_path,
            //     method: "GET",
			// 	data: jQuery.param({ id_color: id_color, field2 : "hello2"}) ,
            //     success: function (response) {
            //     },
            //     error: function (response) {
            //         // ;
            //     }
            // });


		});

		$( "#mua-ngay" ).click(function() {
      // console.log(1)
			if(!$('input[name="color"]').is(':checked') && $('input[name="color"]').length > 0 ) { 
				
				$("#color_error").css({"display": "block"});
				return;
			}

			// if(!$('input[name="accessory"]').is(':checked')  && $('input[name="accessory"]').length > 0  ) { 
				
			// 	$("#accessory_error").css({"display": "block"});
			// 	return;
			// }

			let id_color = '';
			let id_accessory = [];

			if($('input[name="color"]').length > 0){
				id_color = $('input[name="color"]').val();
			}

      var length_accessory =  $("input:checkbox[name='accessory[]']:checked").length;
			if( length_accessory > 0){
				// id_accessory = $('input[name="accessory"]').val();
        // id_accessory =  $("input:checkbox[name='accessory[]']:checked").val();
        $("input:checkbox[name='accessory[]']:checked").each(function(key, value){
          // id_accessory[] = $(value).attr("id_accessory");
          id_accessory.push($(value).attr("id_accessory"));
        });

          if(id_accessory == undefined){
            id_accessory = '';
          }
        }

        id_accessory = encodeURIComponent(JSON.stringify(id_accessory));
        
			window.location.href = route_mua_ngay + '?id_color=' + id_color + '&id_accessory=' + id_accessory
			});

	});

</script>


@endsection