<style>
    .navigation ul li a {
        color: #005876;
        padding-right: 30px;
        font-size: 16px;
        letter-spacing: 0.51px;
    }

    @media only screen and (max-width: 1060px) {
        .header-main .logo img {
            width: 59px;
        }
    }
</style>
<header class="header-main" style="position: relative;">
    <a href="{{url('/')}}" class="logo">
        <img src="{{asset('assets/images/logo.png')}}" alt="logo">
    </a>
    <nav class="navigation">
        <ul>
            <li class="dropdown">
                <a href="#">Destinations</a>
                <ul class="drop-menu wndg-twidth">
                    <div class="drop-menu-sub1">
                        <div class="container2">
                            <div class="left">
                                <div class="drop-menu-submenu1 wgt-padd">
                                    <ul class="img-dms-blo twsgyc">
                                        <li>
                                            <ul class="wid-dms top-week">
                                                @php($dcats = App\Models\Destination::select('*')->get())
                                                @if(count($dcats)> 0)
                                                @foreach($dcats as $dcat)
                                                <li><a
                                                        href="{{url('/packages/'.$dcat->destination_slug)}}">{{$dcat->destination_name}}</a>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <ul>
                                    <li>
                                        <a href="#0"><img
                                                src="{{asset('assets/images/5ffd7275d3f37e4762120bf288af823b.jpg')}}"
                                                alt="package"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            @php($cats = App\Models\TourCategory::select('*')->where('showinheader',1)->get())
            @if(count($cats)> 0)
            @foreach($cats as $cat)
            <li class="dropdown">
                <a href="#">{{$cat->tour_category_name}}</a>
                <ul class="drop-menu wndg-twidth">
                    <div class="drop-menu-sub1">
                        <div class="container2">
                            <div class="left">
                                <div class="drop-menu-submenu1 wgt-padd">
                                    <ul class="img-dms-blo twsgyc">
                                        <li>
                                            <ul class="wid-dms top-week">

                                                @php($scats =
                                                App\Models\TourSubcategory::select('*')->where('status',1)->where('tour_categories_id',$cat->id)->get())
                                                @if(count($scats)> 0)
                                                @foreach($scats as $scats)
                                                <li><a
                                                        href="{{url('/category/'.$scats->slug)}}">{{$scats->tour_subcategory_name}}</a>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right">
                                <ul>
                                    <li>
                                        <a href="#0"><img src="{{asset('assets/web/imgnew/weekend-gateway-menu.jpg')}}"
                                                alt="package"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            @endforeach
            @endif
            <li>
                <a href="{{url('/blogs')}}">Blog</a>
            </li>
        </ul>
    </nav>
    <div class="nav-right">
        <ul>
            <li><a href="{{url('/plan-your-trip')}}"><i class="fa fa-map-marker" aria-hidden="true" style="    color: #2690b1;
    font-size: 18px;
    margin-right: 3px;"></i> Plan Your Trip</a>
            </li>
            <li><a href="tel:+919557711417"><i class="fa fa-phone" aria-hidden="true" style="    color: #2690b1;
    font-size: 18px;
    margin-right: 3px;"></i> +91 9557711417</a>
            </li>

        </ul>
    </div>
    <a href="javascript:void(0);" aria-haspopup="true" tabindex="0" id="onclic" class="tmimenu_btn slicknav_open"
        style="outline: medium none;">
        <div class="tmimenu_icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
    <div class="u-vmenu" id="u-vmenu" style="display: none;">
        <ul>
            <li>
                <a href="#">Destinations</a>
                <span></span>

                <ul>
                    @php($dcats = App\Models\Destination::select('*')->get())
                    @if(count($dcats)> 0)
                    @foreach($dcats as $dcat)
                    <li><a href="{{url('/packages/'.$dcat->destination_slug)}}">{{$dcat->destination_name}}</a></li>
                    @endforeach
                    @endif
                </ul>

            </li>

            @php($cats = App\Models\TourCategory::select('*')->where('showinheader',1)->get())
            @if(count($cats)> 0)
            @foreach($cats as $cat)
            <li>
                <a href="#">{{$cat->tour_category_name}}</a>
                <span></span>

                <ul>
                    @php($scats =
                    App\Models\TourSubcategory::select('*')->where('status',1)->where('tour_categories_id',$cat->id)->get())
                    @if(count($scats)> 0)
                    @foreach($scats as $scats)
                    <li><a href="{{url('/category/'.$scats->slug)}}">{{$scats->tour_subcategory_name}}</a></li>
                    @endforeach
                    @endif
                </ul>


            </li>
            @endforeach
            @endif

            <li>
                <a href="{{url('/blogs')}}">Blog</a>
            </li>

            <li><a href="{{url('/plan-your-trip')}}">Plan Your Trip</a></li>
        </ul>
    </div>
</header>