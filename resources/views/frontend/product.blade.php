@extends('frontend.layouts.base')

@section('title')
    <title>@lang('lang.It24hproduct')</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('asset/css/user/register.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/product.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style_body.css')}}">
@endsection

@section('header')
    @include('frontend.layouts.header-page', [$Sidebars, $Menus])
@endsection

@section('menu-mobile')
    @include('frontend.layouts.menu-mobile', [$Sidebars, $Menus])
@endsection

@section('content')
    <div class="breadcrumb-wrap container-wp">
        <section class="wp-product-banner-top">
            <div class="product-banner">
                <div class="wp-banner-left">
                    <div class="banner-left">
                        <div class="wp-background">
                            @if(!empty($banner_1->image))
                            <a href="">
                                <div  style="background-image: url('{{asset('upload/images/slider').'/'.$banner_1->image}}');"
                                
                                class="background"></div>
                                <div class="wp-content-banner">
                                    <div class="content-banner">
                                        <div class="content-top">
                                            <span>{{$banner_1->name}}</span>
                                        </div>
                                        <h3>{{$banner_1->subtitle}}</h3>
                                        <div class="content-bottom">
                                            <span style="font-size:24px;color:#EF262C;font-weight:500;">{{$banner_1->description}}</span>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif 
                        </div>
                    </div>
                </div>
                <div class="wp-banner-center">
                    <div class="banner-center">
                        <div class="wp-background">
                            @if(!empty($banner_2->image))
                            <a href="">
                                <div style="background-image: url('{{asset('upload/images/slider').'/'.$banner_2->image}}');"
                                
                                 class="background"></div>
                                <div class="wp-content-banner">
                                    <div class="content-banner">
                                        <h3 style="margin-bottom: 0px !important;">{{$banner_2->subtitle}}</h3>
                                        <div class="content-top" style="margin-bottom: 30px !important;">
                                            <span>{{$banner_2->name}}</span>
                                        </div>
                                        <div class="content-bottom">
                                            {{-- Save up<br> --}}
                                            <span style="font-size:24px;color:#EF262C;font-weight:500;">{{$banner_2->description}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif 
                        </div>
                    </div>
                </div>
                <div class="wp-banner-right">
                    <div class="banner-right">
                        <div class="wp-background">
                             @if(!empty($banner_3->image))
                            <a href="">
                                <div 
                               
                                style="background-image: url('{{asset('upload/images/slider').'/'.$banner_3->image}}');"
                                 
                                class="background"></div>
                                <div class="wp-content-banner">
                                    <div class="content-banner">
                                        <div class="content-top">
                                            <span>{{$banner_3->name}}</span>
                                        </div>
                                        <h3 style="margin-bottom: 30px !important;">{{$banner_3->subtitle}}</h3>
                                        <div class="content-bottom">
                                            {{-- Price just<br> --}}
                                            <span style="font-size:24px;color:#EF262C;font-weight:500;">{{$banner_3->description}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="breadcrumb">
            <div class="breadcrumb_default">
                <div class="breadcrumb_populated">
                    <div class="breadcrumb_title">@lang('lang.Myaccount')</div>
                    <nav class="breadcrumb_list">
                        <a href="{{route('user')}}">@lang('lang.Home')</a>
                        <i class="fas fa-angle-right"></i>
                       @lang('lang.Shop')
                    </nav>
                </div>
            </div>
        </section>
    </div>
    <div id="content">
        <div class="container-wp">
            <div class="wp-content clearfix">
                <div class="sidebar">
                    <div class="categories-product-sidebar">
                        <div class="header-sidebar">
                            <span>@lang('lang.Productcategories')</span>
                        </div>
                        <ul class="list-categories">
                            @foreach ($categories as $item)
                            <li class="cat-item">
                                <a href="{{route('product_cat', $item->slug)}}">
                                    @if (!empty($cat) && $cat->id==$item->id)
                                    <i class="fad fa-check-square cat-active"></i>{{$item->name}}
                                    @else
                                    <i class="far fa-square"></i>{{$item->name}}
                                    @endif
                                </a>
                                <span class="count">({{$item->get_product_by_cat()->count()}})</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-price-sidebar">
                        <div class="header-sidebar">
                            <span>@lang('lang.Filterbyprice')</span>
                        </div>
                        <div class="form-filter">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="slider-labels">
                                <div class="price_label">
                                    @lang('lang.Price'): <input type="text" value="10000" class="from" id="slider-range-value1" disabled>@lang('lang.Currencyunit') —
                                    <input type="text" value="100000000" class="to" id="slider-range-value2" disabled>@lang('lang.Currencyunit') 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                        <input type="hidden" id="min-value" name="min-value" value="">
                                        <input type="hidden" id="max-value" name="max-value" value="">
                                        <button type="submit" class="button btn-filter-price">@lang('lang.Filter')</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="filter-color-sidebar">
                        <div class="header-sidebar">
                            <span>@lang('lang.FilterbyColor')</span>
                        </div>
                        <ul class="list-color">
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #05abde;"></span>
                                    <span class="color-name">@lang('lang.Blue')</span>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #475a8b;"></span>
                                    <span class="color-name">@lang('lang.ClassicBlue')</span>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #7ab052;"></span>
                                    <span class="color-name">@lang('lang.Green')</span>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #d64749;"></span>
                                    <span class="color-name">@lang('lang.Red')</span>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #f7cac9;"></span>
                                    <span class="color-name">@lang('lang.RoseQuartz')</span>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #6b5b95;"></span>
                                    <span class="color-name">@lang('lang.UltraViolet')</span>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" class="color-type" href="">
                                    <span class="color-label" style="background: #ffffff;"></span>
                                    <span class="color-name">@lang('lang.White')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="categories-product-sidebar">
                        <div class="header-sidebar">
                            <span>@lang('lang.ProductBrands')</span>
                        </div>
                        <ul class="list-categories">
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Apple
                                </a>
                                <span class="count">(14)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Asano
                                </a>
                                <span class="count">(2)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Digital
                                </a>
                                <span class="count">(8)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Digitechno
                                </a>
                                <span class="count">(10)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Electronic
                                </a>
                                <span class="count">(3)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Hightech
                                </a>
                                <span class="count">(16)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Sony
                                </a>
                                <span class="count">(2)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Samsung
                                </a>
                                <span class="count">(2)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Technolo
                                </a>
                                <span class="count">(2)</span>
                            </li>
                            <li class="cat-item">
                                <a href="#">
                                    <i class="far fa-square"></i> Oppo
                                </a>
                                <span class="count">(0)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="product-tag-sidebar">
                        <div class="header-sidebar">
                            <span>@lang('lang.ProductTags')</span>
                        </div>
                        <div class="tagcloud">
                            <a href="#">Accessories</a>
                            <a href="#">Camera & Videos</a>
                            <a href="#">Computer & Laptop</a>
                            <a href="#">Gaming</a>
                            <a href="#">Headphone</a>
                            <a href="#">Mobile & Tablets</a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="sorting">
                        <a href="javascript:;" class="filter-mobile" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <i class="fas fa-sliders-v"></i>
                            <span>@lang('lang.Filterby')</span>
                        </a>
                        <div class="dropdown ordering">
                            <a class="dropdown-toggle text-secondary" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('lang.Filterby')
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'A-Z']) }}">@lang('lang.From') A-Z</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'Z-A']) }}">@lang('lang.From') Z-A</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'gia-giam-dan']) }}">@lang('lang.Sortbypricehightolow')</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'gia-tang-dan']) }}">@lang('lang.Sortbypricelowtohigh')</a></li>
                            </ul>
                        </div>
                        <p class="showing">
                            @lang('lang.Showing') {{$products->firstItem()}}–{{$products->lastItem()}} @lang('lang.Of') {{$products->total()}} @lang('lang.Results')
                        </p>
                    </div>
                    <div class="wp-list-product">
                        <div class="body_products">
                            <div class="products_default">
                                <div class="products_border" style="border: none !important;">
                                    <ul class="list-product">
                                        @foreach ($products as $item)
                                        <li>
                                            <div class="product_style-default">
                                                <div class="product-block">
                                                    <div class="product-header">
                                                        <div class="posted-in">
                                                            @foreach ($item->category as $cat)
                                                            <a href="{{route('product_cat', $cat->slug)}}">{{$cat->name}}</a>,
                                                            @endforeach
                                                        </div>
                                                        <h3 class="product-title">
                                                            <a href="{{route('detailproduct', $item->slug)}}">{{$item->name}}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="product-transition">
                                                        @if(!empty($item->onsale))
                                                            <span class="onsale">-{{$item->onsale}}%</span>
                                                        @endif
                                                        <div class="product-image">
                                                            <img width="300" height="300" src="{{asset('upload/images/products/medium/'.$item->thumb)}}">
                                                        </div>
                                                        <a href="{{route('detailproduct', $item->slug)}}" class="product_link"></a>
                                                    </div>
                                                    <div class="product-caption">
                                                        <div class="product-caption-top">
                                                        <span class="price">
                                                            @if(!empty($item->onsale))
                                                                <del>{{number_format($item->price,0,',','.')}} @lang('lang.Currencyunit')</del>
                                                                <ins>{{number_format($item->price_onsale,0,',','.')}} @lang('lang.Currencyunit')</ins>
                                                            @else
                                                                <del></del>
                                                                <ins>{{number_format($item->price,0,',','.')}} @lang('lang.Currencyunit')</ins>
                                                            @endif
                                                        </span>
                                                            <div class="count-review">
                                                                <div class="rating2">
                                                                    <div class="rating-upper" style="width: {{$item->count_vote()}}%">
                                                                        <span><i class="fas fa-star"></i></span>
                                                                        <span><i class="fas fa-star"></i></span>
                                                                        <span><i class="fas fa-star"></i></span>
                                                                        <span><i class="fas fa-star"></i></span>
                                                                        <span><i class="fas fa-star"></i></span>
                                                                    </div>
                                                                    <div class="rating-lower">
                                                                        <span><i class="fal fa-star"></i></span>
                                                                        <span><i class="fal fa-star"></i></span>
                                                                        <span><i class="fal fa-star"></i></span>
                                                                        <span><i class="fal fa-star"></i></span>
                                                                        <span><i class="fal fa-star"></i></span>
                                                                    </div>
                                                                </div>
                                                                <span>({{$item->votes->count()}} @lang('lang.Review'))</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-caption-bottom">
                                                            <a href="javascript:;" class="add_to_cart_button" onclick="add_cart({{$item->id}})"><i class="far fa-shopping-cart"></i>@lang('lang.Addtocart')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {!! $products->links('frontend.pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar mobile -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title HideFilter" id="offcanvasScrollingLabel">@lang('lang.HideFilter')</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="sidebar">
            <div class="categories-product-sidebar">
                <div class="header-sidebar">
                    <span>@lang('lang.Productcategories')</span>
                </div>
                <ul class="list-categories">
                    @foreach ($categories as $item)
                        <li class="cat-item">
                            <a href="{{route('product_cat', $item->slug)}}">
                                @if (!empty($cat) && $cat->id==$item->id)
                                <i class="fad fa-check-square cat-active"></i>{{$item->name}}
                                @else
                                <i class="far fa-square"></i>{{$item->name}}
                                @endif
                            </a>
                            <span class="count">({{$item->get_product_by_cat()->count()}})</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="filter-price-sidebar">
                <div class="header-sidebar">
                    <span>@lang('lang.Filterbyprice')</span>
                </div>
                <div class="form-filter">
                    <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="slider-range1"></div>
                        </div>
                    </div>
                    <div class="slider-labels">
                        <div class="price_label">
                            @lang('lang.Price'): <input type="text" value="10000" class="from" id="slider-range-value3" disabled>@lang('lang.Currencyunit') —
                                    <input type="text" value="100000000" class="to" id="slider-range-value4" disabled>@lang('lang.Currencyunit')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" id="min-value1" name="min-value" value="">
                            <input type="hidden" id="max-value2" name="max-value" value="">
                            <button type="submit" class="button btn-filter-price-1">@lang('lang.Filter')</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="filter-color-sidebar">
                <div class="header-sidebar">
                    <span>@lang('lang.FilterbyColor')</span>
                </div>
                <ul class="list-color">
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #05abde;"></span>
                            <span class="color-name">@lang('lang.Blue')</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #475a8b;"></span>
                            <span class="color-name">@lang('lang.ClassicBlue')</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #7ab052;"></span>
                            <span class="color-name">@lang('lang.Green')</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #d64749;"></span>
                            <span class="color-name">@lang('lang.Red')</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #f7cac9;"></span>
                            <span class="color-name">@lang('lang.RoseQuartz')</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #6b5b95;"></span>
                            <span class="color-name">@lang('lang.UltraViolet')</span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" class="color-type" href="">
                            <span class="color-label" style="background: #ffffff;"></span>
                            <span class="color-name">@lang('lang.White')</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="categories-product-sidebar">
                <div class="header-sidebar">
                    <span>@lang('lang.ProductBrands')</span>
                </div>
                <ul class="list-categories">
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Apple
                        </a>
                        <span class="count">(14)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Asano
                        </a>
                        <span class="count">(2)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Digital
                        </a>
                        <span class="count">(8)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Digitechno
                        </a>
                        <span class="count">(10)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Electronic
                        </a>
                        <span class="count">(3)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Hightech
                        </a>
                        <span class="count">(16)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Sony
                        </a>
                        <span class="count">(2)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Samsung
                        </a>
                        <span class="count">(2)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Technolo
                        </a>
                        <span class="count">(2)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">
                            <i class="far fa-square"></i> Oppo
                        </a>
                        <span class="count">(0)</span>
                    </li>
                </ul>
            </div>
            <div class="product-tag-sidebar">
                <div class="header-sidebar">
                    <span>@lang('lang.ProductTags')</span>
                </div>
                <div class="tagcloud">
                    <a href="#">Accessories</a>
                    <a href="#">Camera & Videos</a>
                    <a href="#">Computer & Laptop</a>
                    <a href="#">Gaming</a>
                    <a href="#">Headphone</a>
                    <a href="#">Mobile & Tablets</a>
                </div>
            </div>
        </div>
    </div>
    <p id="message_add_cart" style="display:none;">@lang('lang.Productaddedtocartsuccessfully')</p>
@endsection

@section('footer')
    @include('frontend.layouts.footer')
@endsection

@section('js')
<script src="{{asset('asset/js/filter-price.js')}}"></script>
<script>
    $(document).ready(function(){
            //Add to Cart
            
            var mess = document.getElementById('message_add_cart').innerHTML;
            add_cart = function(id){
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    var data = {
                        id: id,
                        _token: _token
                    };

                    $.ajax({
                        url: "{{ route('add_cart_ajax') }}",
                        method: 'POST',
                        data: data,
                        dataType: "json",
                        success: function(data) {
                            alert(mess);
                            $('#count-cart').text(data.count);
                    },
                });
            }
    });
</script>
@endsection





