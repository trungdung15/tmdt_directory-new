<header>
        <section style="padding:0">
        <div class="headmenu">
            <div class="headmenucontainer">
                <div class="headmenucontainer-col">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fal fa-map-marker-alt"></i>
                                <span>@lang('lang.Findastore')</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fal fa-truck"></i>
                                <span>@lang('lang.Customercare')</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fal fa-bags-shopping"></i>
                                <span>@lang('lang.Shop')</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="float-end mobilelanguage">
                   <div class="dropdown dropdown-menucolor">
                          <div class=" btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('lang.Language')
                          </div>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{!! route('app.setLocale',['vi']) !!}">@lang('lang.Vietnamese')</a></li>
                            <li><a class="dropdown-item" href="{!! route('app.setLocale',['en']) !!}">@lang('lang.English')</a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="headmenu2">
                <div class="headmenucontainer2">
                    <div id="iconmenumobile" style="color: white;"><i class="fal fa-bars"></i></div>
                     <div class="logohead">
                        <a href="{{route('user')}}">
                            <img src="{{asset('asset/images/it24h.png')}}" alt="logo" width="80%" height="auto">
                        </a></div>
                    <div class="searchbar">
                        <form role="search" method="get" class="woocommerce-product-search" action="{{route('list_product')}}">
                        <label class="screen-reader-text" for="woocommerce-product-search-field-1"></label>
                        <input type="text" id="searchs" class="search-field" placeholder="@lang('lang.Search')" name="searchs">
                        <button type="submit" value="Search"><i class="fal fa-search"></i></button>
                        <input type="hidden" name="post_type" value="product">
                        <div class="search-by-category input-dropdown">
                            <div class="input-dropdown-inner digitaz-scroll-content">
                                <select id="select_cat">
                                    <option value="" selected>@lang('lang.Allcategory')</option>
                                    @foreach($Sidebars as $Sidebar)
                                    @if($Sidebar->parent_id==0)
                                    <option value="{{$Sidebar->slug}}">{{$Sidebar->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </form>
                        <div class="ajax-search-result" id="ajax-search"></div>
                    </div>
                    <div class="loginhead">
                    <div class="header-group-action">
                        <div class="site-header-wishlist userhead">
                            <a href="{{route('user_account')}}" class="login-header-mobile"><i class="fal fa-user"></i></a>
                            @if ((Session::has('is_login') && Session::get('is_login') == true) || !empty(Cookie::get('remember-me')))
                                <a href="{{route('user_account')}}" class="login-ajax-header-mobile"><i class="fal fa-user"></i></a>
                            @else
                                <div class="wp-dropdown">
                                    <a href="javascript:;" class="dropdown-login-toggle">
                                        <i class="fal fa-user"></i>
                                    </a>
                                    <div class="dropdown-login">
                                        <div class="form-error-header">

                                        </div>
                                        <form action="">
                                            <div class="header-form">
                                                <span>@lang('lang.Signin')</span>
                                                <a href="{{route('user_login_register')}}">@lang('lang.Createaccount')</a>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">@lang('lang.Email')</label>
                                                <input type="email" class="form-control" name="email" id="email-header" placeholder="Email" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">@lang('lang.Password')</label>
                                                <input type="password" class="form-control" name="password" id="password-header" placeholder="Password" required>
                                            </div>
                                            <a href="javascript:;" class="btn btn-primary btn-login" id="login-ajax">@lang('lang.Login')</a>
                                            <a href="{{route('forgot_password')}}">@lang('lang.Forgetpassword')</a>
                                        </form>
                                        <a href="{{route('login-facebook')}}" class="btn-login-facebook btn btn-primary w-100 mt-2"><i class="fab fa-facebook-square me-2"></i>@lang('lang.loginwithfb')</a>
                                        <a href="{{route('login-google')}}" class="btn-login-google btn btn-danger w-100 mt-2"><i class="fab fa-google me-2"></i> @lang('lang.loginwithgg')</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="site-header-wishlist hearthead">
                            <a href="{{route('list_wish')}}">
                                <i class="fal fa-heart"></i>
                                <span class="count" id="count-wish">
                                    @if (!empty(Cookie::get('count_wish')))
                                        {{Cookie::get('count_wish')}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </a>
                        </div>
                        <div class="site-header-wishlist shopinghead">
                            <a href="{{route('list_cart')}}">
                                <i class="fal fa-bags-shopping"></i>
                                <span class="count" id="count-cart">{{Cart::count()}}</span>
                            </a>
                        </div></div>
                    </div>
            </div>
    </section>
    <div class="nav" id="topnav">
        <section class="" style="margin: 0px;">
            <div class="allcol">
                <div class="col-3 sidebarss">
                    <div class="vertical-navigation-title">
                        <div class="title-icon">
                            <span class="icon-1"></span>
                            <span class="icon-2"></span>
                            <span class="icon-3"></span>
                        </div>
                        <div class="titlesidebar">
                            @lang('lang.Shopbydepartment')
                        </div>
                    </div>
                   <div class="digitaz-icon"></div>
                    <div class="vertical-menu">
                    <ul class="menusidebar" >
                        @foreach($Sidebars as $Sidebar)
                        @if($Sidebar->parent_id == 0)
                        <li><a href="{!! route('product_cat', ['slug' => $Sidebar->slug]) !!}" class="rowsidebar row">{!! $Sidebar->icon !!}<span class="col-9">
                                    @if($locale =='vi')
                                    {{$Sidebar->name}}
                                    @else {{$Sidebar->name2}}
                                    @endif</span>
                            <i class="fal fa-angle-right col-1"></i></a>
                            <ul class="submenu">
                                @foreach($Sidebars as $subSidebar)
                                @if($subSidebar->parent_id == $Sidebar->id)
                                <li class="submenucol">
                                    <div class="submenucolcontent">
                                    <h2><a style="border:none;font-size: 14px;font-weight: 700;" href="{{ route('product_cat', ['slug' => $subSidebar->slug])}}">
                                            @if($locale =='vi')
                                            {{$subSidebar->name}}
                                            @else {{$subSidebar->name2}}
                                            @endif</a></h2>
                                    @if(count($subSidebar->childs))
                                    <ul class="levelmenu_ul">
                                        @include('frontend.subsidebar',['childs' => $subSidebar->childs])
                                    </ul>
                                    @endif
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    </div>
                </div>
                <div class="col-6 menu">
                    <ul>
                    <li>
                        <a href="{{route('user')}}"><i class="fal fa-home"></i>
                            <span>@lang('lang.Home')</span>
                            {{-- <i class="fal fa-angle-down"></i> --}}
                        </a>
                        {{-- <div class="submenu2 mega-menu">
                        <ul class="submenu2li col-8">
                            <li class="submenucol2">
                                <a href="#">
                                    <h2>Name Category level 2</h2>
                                    <ul class="levelmenu_ul">
                                        <li class="levelmenu_li1">
                                            <a href="#">Name Category level 3</a>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                        <ul class="submenu2li col-3 " style="background-color: red; width:400px; height:400px">
                        </ul> --}}
                    </li>

                     <li>
                        <a href="{{route('list_product')}}"><i class="fal fa-shopping-bag"></i>
                            <span>@lang('lang.Shop')</span>
                            <i class="fal fa-angle-down"></i>
                        </a>
                        <ul class="sub_normal">
                            <li class="li_normal"><a href="#">Category name 1</a></li>
                            <li class="li_normal"><a href="#">Category name 1</a></li>
                            <li class="li_normal"><a href="#">Category name 1</a></li>
                            <li class="li_normal"><a href="#">Category name 1</a></li>
                            <li class="li_normal"><a href="#">Category name 1</a></li>
                            <li class="li_normal"><a href="#">Category name 1</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('categoryBlogs')}}"><i class="fal fa-newspaper"></i>
                            <span>@lang('lang.Blog')</span>
                            <i class="fal fa-angle-down"></i>
                        </a>
                        <ul class="sub_normal">
                            @foreach($getcategoryblog as $cat_blog)
                            <li class="li_normal"><a href="{{route('categoryBlog',[$cat_blog->slug])}}">
                            @if($locale =='vi')   {{$cat_blog->name}}
                            @else  {{$cat_blog->name2}}
                            @endif
                            </a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('contact')}}"><i class="fal fa-phone-alt"></i>
                            <span>@lang('lang.Contact')</span>
                        </a>
                    </li>
                    </ul>
                </div>
                <div class="col-3 rightmenu">
                    <div class="rightmenu_flexend ">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fal fa-badge-percent" style="font-size:17px;color: red;">
                                    </i>
                                    <span>
                                        @lang('lang.Amazingdeals')
                                    </span>
                                    <i class="fal fa-angle-down">
                                    </i>
                                </a>
                                 <div class="submenu2 mega-menu">
                                    <ul class="submenu2li">
                                        <li>
                                            <a href="#">
                                                <span>
                                                    Computer Components
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="phonecontact">
                        <i class="fal fa-phone-alt"></i>
                        <span>088 677 6286</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>

