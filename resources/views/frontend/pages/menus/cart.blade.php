{{-- cart form --}}
  @if (LoadStatics::getCartCount() > 0)
  
  <div class="top-cart-contain">
  <div class="mini-cart">
    <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle" id="myDIV">
      <a href="{!! url('gio-hang') !!}" >
        <div class="cart-box""><span id="cart-total"><strong>{!! LoadStatics::getCartCount() !!}</strong> <span class="hidden-xs">sản phẩm</span></span></div>
      </a>
    </div>
    <div>
      <div class="top-cart-content arrow_box hidden-xs hidden-sm">
        <div class="block-subtitle">Các sản phẩm đã được mua</div>
        <ul id="cart-sidebar" class="mini-products-list"> 
        @foreach(LoadStatics::getCart() as $item)
        <li class="item even">
          <a class="product-image" href="#" title="">
            <img alt="" src="{!! asset('public/uploads/products/'.$item->options->img) !!}" width="80">
          </a>
          <div class="detail-item">
          <div class="product-details">
          <a href="{!! url('xoa-san-pham',['id'=> $item->rowId]) !!}" title="Bỏ sản phẩm"  class="glyphicon glyphicon-remove">&nbsp;</a>
          <p class="product-name"> 
          <a href="{!! url('san-pham/'.$item->options->alias) !!}" title="">{!! $item->name !!}</a>
          </p>
          </div>
          <div class="product-details-bottom"> 
            <span class="price">{!! number_format($item->price) !!}₫</span>
            <span class="title-desc">Số lượng:</span>
            <strong>{!! $item->qty !!}</strong><br>
            <span class="title-desc">Tổng tiền:</span>
            <strong class="price">{!! number_format($item->price*$item->qty) !!}₫</strong>
          </div>
          </div>
        </li>
        @endforeach
        </ul>
        <div class="top-subtotal">Tổng tiền: <span class="price">{!! LoadStatics::getCartTotal() !!}₫</span></div>
        <div class="actions">
          <a class="btn-checkout" href="{!! url('dat-hang') !!}"><span>Hoàn tất đặt hàng</span></a>
          <a class="view-cart" href="{!! url('gio-hang') !!}"><span>Giỏ hàng</span></a>
        </div>
      </div>
    </div>
  </div>        
</div>
@endif
{{-- end cart form --}}