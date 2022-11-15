<style>
  .numberCircle {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    padding: 2px;
    border: 1px solid #666;
    color: red;
    text-align: center;
  }

  .table#cart tbody tr td:first-child {
    background: none !important;
  }

</style>
<div class="row">
  <div class="col-1">
    <ul class="navmenu" style="display: inline;">
      <li>
        <div class="menutop1">
          <div class="toggle">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
          </div>
        </div>
      </li>

    </ul>
  </div>
  <div class="col-3" style="vertical-align: middle;">
    <a title="vinacenter" href="/"><img src="{!! asset('public/uploads/banner/'.LoadStatics::getLogo()) !!}"
                                        alt="vinacenter"></a>
  </div>
  <div class="col-2" style="margin-top:8px;">
    <a title="vinacenter" href="{!! url('gio-hang') !!}" style="color:red;font-size:18px;"><span
              class="numberCircle">{!! LoadStatics::getCartCount() !!}</span><i class="fas fa-shopping-cart"></i></a>
  </div>
  <div class="col-6 text-info" style="margin-top: 11px; color: white">

    @if (!Auth::guest())

      <i class="fas fa-caret-right" style="color: #0098da;;"></i><a class="text-info" href="{!! route('getOrderList') !!}" target="_blank"> Quản lý đơn hàng</a>
      <i class="fas fa-caret-right" style="color: #0098da;;"></i><a class="text-info" href="{!! route('getLogout') !!}"> Thoát</a>
    @else
     <i class="fas fa-caret-right" style="color: #0098da;;"></i><a class="text-info" href="{!! route('getLogin') !!}"> Đăng Nhập</a>
      @endif


  </div>
  <div class="col-lg-12 bg-dark p-2">
    <form action="{{ route('frontend.search') }}" method="get">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm" value="{{ Request::get('search') }}"
               maxlength="70" name="search"
               id="txtSearch">
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<ul style="display:none;background-color: #ccc;padding: 3px;" class="submenu">
  <li>
    <ul class="topnav bg-secondary">
        <?php $ct = App\Models\Cate::select("id", "parent_id", "name", "alias")->where('parent_id', 0)->get()->toArray(); ?>
      @foreach($ct as $key => $it)
        <li class="level0 level-top parent pl-2 mobile_menu_parent">
          <a href="#"> <span>{!! $it["name"] !!}</span> </a><em id="menu_mobile{{$key}}"
                                                                class="btn_mobile menu_mobile{{$key}}">+</em>
          <ul class="level0 bg-light menu_mobile{{$key}}" style="overflow: scroll; height: 200px;">
              <?php $children = App\Models\Cate::where('parent_id', $it["id"])->orderby('is_index', 'asc')->get()->toArray(); ?>
            @foreach($children as $item)
              <li class="level0">
                <a href="{!!route('getProductType',['alias' => $item["alias"]])!!}">
                  <span>{!! $item["name"] !!}</span>
                </a>
                  <?php $children1 = App\Models\Cate::where('parent_id', $item["id"])->where('is_active', 1)->orderby('is_index', 'asc')->get()->toArray(); ?>
                @if(count($children1) > 0)
                  <ul class="level11 bg-light border-none menu_mobile{{$key}}" style="overflow: scroll; height: 200px;">
                    @foreach($children1 as $item1)
                      <li class="level0 p-4 m-2">
                        <a href="{!!route('getProductType',['alias' => $item1["alias"]])!!}">
                          <span>{!! $item1["name"] !!}</span>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                @endif
              </li>
            @endforeach
          </ul>
        </li>
      @endforeach
    </ul>
  </li>
</ul>

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn_mobile').on('click', function () {
            $('.mobile_menu_parent ul').addClass('d-none');
            let id = $(this).attr('id');
            $('.' + id).removeClass('d-none');
        });
    });
</script>