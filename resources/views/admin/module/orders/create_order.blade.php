@extends('admin.master')
@section('title','Danh sách đơn hàng')
@section('content')
  <style type="text/css">
    a {
      cursor: pointer;
    }
  </style>
  <div class="table-agile-info p-2">
    <div class="row">
      <div class="col-lg-12">
       
        <div class="row mt-3">
          <div class="col-lg-12">
              <table>
                  <tr>
                      <form action="" method="GET">
                          <td>
                              <div class="input-group mb-3 p-r-2">
                                  <input type="text" class="form-control" placeholder="Search" name="keyword"
                                         value="{{ Request::get('keyword') }}">
                                  <div class="input-group-append">
                                      <button class="btn btn-success" type="submit"><i class="fa fa-search"
                                                                                       aria-hidden="true"></i> Tìm tên sản phẩm
                                      </button>
                                  </div>
                              </div>
                          </td>
                      </form>
                 
                  </tr>
              </table>
          </div>
      </div>
      


      </div>
    </div>
    
  

    <div id="accordion">
      <div class="row">
        <div class="col-lg-6">
     
        </div>
        <div class="col-lg-12">
        
		
		  <table class="table table-striped mb-1">
            <thead>
            <tr>
			  <th width="10%">Hình ảnh</th>
              <th width="10%">Tên sản phẩm</th>
              <th width="10%">Loại sản phẩm</th>
              <th width="10%">Giá dealer</th>
              <th width="10%">Giá web</th>
              <th width="10%">Người bán</th>
              <th width="10%">Ngày tạo sản phẩm</th>
              <th width="10%">Xem chi tiết</th>
              {{-- <th width="10%">Trạng thái</th> --}}
              {{-- <th width="5%">Bonus</th> --}}
       
            </tr>
            </thead>
          </table>
		  	@if (!empty($data))
			


			  {{-- <div class="col-lg-12">
				<div class="row">
				  @foreach($data as $item)
					<div class="col-6 col-lg-3">
					  <div class="product-grid7">
						<div class="product-image7">
						  <a href="{!! url('san-pham/'.$item['alias']) !!}">
							<img class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
							<img class="pic-2" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
						  </a>
						  <span class="product-new-label">New</span>
						</div>
						<div class="product-content bg-light">
						  <h3 class="title">
							<a  href="{!! url('san-pham/'.$item['alias']) !!}" title="{!! $item['name'] !!}">
							  {!! str_limit($item['name'],30,'...') !!}
							</a>
						  </h3>
						  <ul class="social1 list-inline mb-0">
							<li><a href="{!! url('san-pham/'.$item['alias']) !!}" class="fa fa-search" title="Chi tiết"></a></li>
							<li><a href="{!! url('mua-hang',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-bag" title="Thêm vào Giỏ hàng"></a></li>
							<li><a href="{!! url('mua-ngay',[$item["id"],$item["alias"]]) !!}" class="fa fa-shopping-cart" title="Mua ngay"></a></li>
						  </ul>
						  <div class="mb-4">
							<span class="price">{!! number_format($item['value'] )!!}₫</span>
						  </div>
						</div>
					  </div>
					</div>
				  @endforeach
				</div>
			  </div> --}}
			
				 @foreach($data as $key => $item)
				 {{-- {{dd($item)}} --}}
					<table class="table  mb-1 table-hover">
						<tbody>
							<td width="10%">
								<div class="product-image7">
									<a href="{!! url('san-pham/'.$item['alias']) !!}">
									  <img style="max-width: 150px;" class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}">
									  {{-- <img style="max-width: 150px;" class="pic-2" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}"> --}}
									</a>
									<span class="product-new-label">New</span>
								  </div>
								{{-- <img style="max-width: 150px;" class="pic-1" src="{!! isset($item["image"]) ? asset('public/uploads/products/'.$item["image"]) : asset('public/images/nophoto.png') !!}"> --}}
							</td>

							<td width="10%">
								{!! $item['name']  !!}
							</td>

							<td width="10%">
								@php
									$product = $item->product;
									$cate = $product->cate;
								@endphp
								{!! data_get($cate, 'name')  !!}
							</td>

							<td width="10%">
								{!!number_format($item['dealer']) .' đ'  !!}
							</td>

							<td width="10%">
								{!!number_format($item['value']) .' đ'  !!}
							</td>	
							
							<td width="10%">
								{!! $item['user_id'] !!}
							</td>
							
							<td width="10%">
								{!! $item['created_at'] !!}
							</td>

							<td width="10%">
								<a  href="{!! url('san-pham/'.$item['alias']) !!}"  target="_blank" rel="noopener noreferrer" title="{!! $item['name'] !!}">
								<button type="button" class="btn btn-info">Xem chi tiết

										{{-- {!! str_limit($item['name'],30,'...') !!} --}}
									</button>
								</a>
							</td>

						</tbody>
					</table> 
				
				{{-- <table id="collapse{{$key}}" class="table collapse bg-light" data-parent="#accordion">
				<tr>
					<td>
					<table class="table">
						<thead>
						<tr class="bg-light">
						<th>Tên sản phẩm</th>
						<th>SL</th>
						<th>Giá dealer</th>
						<th>Giá web</th>
						<th>Voucher Code</th>
						<th>Giá sale</th>
						<th>Thành tiền</th>
						<th>Chiếc khấu</th>
						<th>Bảo hành</th>
						</tr>
						</thead>

						<tbody>
						@foreach($item->details as $key => $detail)
						<tr>
							
							<td>
							{!! $detail->product_name !!}
							</td>
							<td>
							{!! $detail->qty !!}
							</td>
							<td>
							{!! number_format($detail->dealer) !!}
							</td>
							<td>
							{!! number_format($detail->price) !!}
							</td>


							<td>
								@if(!empty($detail->voucher_code))
								{{$detail->voucher_code }} ( giảm   {!! number_format($detail->bonus) !!} đ)
								@endif
							</td>

						
							<td>
							{!! number_format($detail->real_price) !!}
							</td>

							<td>
							{!! number_format($price_ * $detail->qty )!!}
							</td>
							<td>
							<span class="badge badge-success">
								{{number_format($detail->qty*($price_ - $detail->dealer))}}
							</span>
							</td>
							<td>
							{!! number_format($detail->warranty) !!} tháng
							</td>
						</tr>
						@endforeach
						<tr>
						<td>
							<div class="row">
							<div class="col-lg-8">
								<span class="font-weight-bold">Phí vận chuyển:</span>
								@if($item->express_human ==3)
								Khách trả phí
								@elseif($item->express_human ==2)
								Sale trả phí
								@else
								Shop trả phí
								@endif
							</div>
							<div class="col-lg-4">
								{!! number_format($item->fee) !!}
							</div>
							</div>
						</td>
						<td></td>
						<td colspan="3" class="text-left font-weight-bold"></td>
						<td colspan="" class="text-left font-weight-bold">Tổng cộng</td>

						<td>{!! number_format($item->total) !!}</td>
						<td colspan="2">{!! number_format($item->bon) !!}</td>

						</tr>
						<tr>
						<td>
							<div class="row">
							<div class="col-lg-8 font-weight-bold">
								Chiếc khấu sau cùng
							</div>
							<div class="col-lg-4">
								@if($item->express_human ==2)
								{!! number_format($item->bon - $item->fee) !!}
								@else
								{!! number_format($item->bon) !!}
								@endif
							</div>
							</div>
						</td>
						<td></td>
						<td colspan="3" class="text-right font-weight-bold"></td>
						<td colspan="1" class="text-left font-weight-bold">Đặt cọc</td>
						<td colspan="3">
							{!! isset($item->deposit) ? number_format($item->deposit) : number_format($item->depo) !!}
						</td>
						</tr>
						<tr>
						<td>
							<div class="row">
							<div class="col-lg-4 font-weight-bold">
								Mã vận đơn
							</div>
							<div class="col-lg-8">
								{{$item->lading_code}}
							</div>
							</div>
						</td>
						<td></td>
						<td colspan="1" class="text-left font-weight-bold">Loại thanh toán</td>
						<td>{{$item->pay_type}}</td>
						<td class="font-weight-bold"></td>
						<td class="font-weight-bold">Thành tiền</td>
						<td colspan="3">
							{!! isset($item->deposit) ? number_format($item->total - $item->deposit) : number_format($item->total - $item->depo) !!}
						</td>
						</tr>
						</tbody>
					</table>
					</td>
				</tr>
				</table> --}}

				
				@endforeach
			

        </div>
        <div class="col-lg-12">
          <div class="">{{ $data->links() }}</div>
        </div>
		@endif

      </div>
    </div>
  </div>
@endsection