    @extends('frontend.layouts.base')

    @section('title')
        <title>@lang('lang.It24hdetail')</title>
    @endsection

    @section('header')
        @include('frontend.layouts.header-page', [$Sidebars, $Menus])
    @endsection

    @section('menu-mobile')
        @include('frontend.layouts.menu-mobile', [$Sidebars, $Menus])
    @endsection

    @section('content')
    <div class="colfull clearfix">
        <div class="contentarea">
            <div class="linkhead">
                <nav class="breadcrumb">
                        <a href="{{route('user')}}">
                            @lang('lang.Home')
                        </a>
                       <i class="fal fa-angle-right"></i>
                        <a href="{{route('list_product')}}">
                            @lang('lang.Shop')
                        </a>
                        <i class="fal fa-angle-right"></i>
                        {{$Products->name}}
                </nav>
            </div>
            <div class="detailproduct">
                <div class="imgproduct col-xl-6">
                    <div class="imgp">
                        <a class="product-gallery__trigger" href="{{ asset('/upload/images/products/'.$Products->thumb) }}" id="zoomer_b">
                            <i class="far fa-eye">
                            </i>
                        </a>
                        <div class="product-video-360">
                            <a class="product-video-360__btn btn-video" href="#">
                                <i class="far fa-play">
                                </i>
                            </a>
                        </div>
                        @if (!empty($Products->onsale))
                            <span class="onsale onsalescreen">
                                -{{$Products->onsale}}%
                            </span>
                        @endif
                        <div class="flex-viewport">
                            <figure id="img-zoomer-box">
                                <a href="{{ asset('/upload/images/products/'.$Products->thumb) }}" id="zoomer_a">
                                    <img id="img-1" src="{{ asset('/upload/images/products/'.$Products->thumb) }}"/>
                                </a>
                                <div id="img-2" style="background: url('{{ asset('/upload/images/products/'.$Products->thumb) }}') no-repeat #FFF;">
                                </div>

                            </figure>
                        </div>
                    </div>
                    <ol class="flex-control-nav flex-control-thumbs">
                        @if($Products->image != "no-images.jpg")
                        @foreach($img as $item)
                        <li>
                            <img class="imgproduct_thumb" data-o_src="{{ asset('/upload/images/products/' . $item) }}" height="150" src="{{ asset('/upload/images/products/thumb/'. $item) }}" width="150"/>
                        </li>
                        @endforeach
                        @endif
                    </ol>
                </div>
                <div class="infop col-xl-6">
                    <div class="">
                        <div class="topinfop">
                            <div class="instock">
                                @lang('lang.InStock')
                            </div>
                            <nav class="nextpreview">
                                <a href="@if(!empty($PreviewProducts->slug)){{route('detailproduct',$PreviewProducts->slug)}} @endif">
                                    <span><i class="far fa-arrow-left"></i>@lang('lang.Prew')</span>
                                   {{--  <div class="product-item">
                                        <img src="{{ asset('/upload/images/products/' . $PreviewProducts->thumb) }}" width="80px" height="80px">
                                    </div> --}}
                                </a>
                                <a href="@if(!empty($NextProducts->slug)){{route('detailproduct',$NextProducts->slug)}}@endif" style="margin-left: 25px;">
                                    <span>@lang('lang.Next')<i class="far fa-arrow-right"></i></span>
                                </a>
                            </nav>
                        </div>
                        <h1>
                            {{$Products->name}}
                        </h1>
                        <div class="typep">
                            <div class="product-brand">
                                @lang('lang.Brands'):
                                <a href="#">
                                    {{$Products->brand}}
                                </a>
                            </div>
                            <div class="product-brand">
                                @lang('lang.Model'):
                                <a href="#">
                                    MYL92LL/A
                                </a>
                            </div>
                            <div class="product-brand">
                                @lang('lang.Code'):
                                <a href="javascript:;">
                                    #IT24H{{$Products->id}}
                                </a>
                            </div>
                        </div>
                        <p class="pricep">
                            @if (!empty($Products->onsale))
                                <del aria-hidden="true">
                                    <span>
                                        <bdi>
                                            {{number_format($Products->price,0,',','.')}}
                                            <span>@lang('lang.Currencyunit')</span>
                                        </bdi>
                                    </span>
                                </del>
                                <ins>
                                    <span>
                                        <bdi>{{number_format($Products->price_onsale,0,',','.')}}
                                            <span>@lang('lang.Currencyunit')</span>
                                        </bdi>
                                    </span>
                                </ins>
                            @else
                                <ins>
                                    <span><bdi>{{number_format($Products->price,0,',','.')}}
                                            <span> @lang('lang.Currencyunit')</span>
                                          </bdi>
                                     </span>
                                </ins>
                            @endif

                        </p>
                        <div class="rating2">
                            <div class="rating-upper" style="width: {{$Products->count_vote()}}%;">
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
                        <a class="sub_rating" href="#reviews" rel="nofollow">
                            (<span class="count">{{$Products->votes->count()}}</span> @lang('lang.Review'))
                        </a>
                        <div class="descriptionp">
                            {!! $Products->short_content !!}
                        </div>
                        <table>
                            <tbody>
                                @if(count($colors) != 0)
                                <tr class="choosecolor">
                                    <th>
                                        <label>
                                            @lang('lang.Color'):
                                        </label>
                                        <span class="sub_color_name">
                                        </span>
                                    </th>
                                    <td>
                                        <ul>
                                            @foreach ($colors as $color)
                                                <li>
                                                    <input id="color{{$color->id}}" type="raido">
                                                        <label class="color_value_check" data-placement="top" title="{{$color->name}}" data-toggle="tooltip" for="color{{$color->id}}" style="background-color: {{$color->color}};">
                                                        </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                @endif
                                @if(count($sizes) != 0)
                                <tr class="choosesize">
                                    <th>
                                        <label>
                                            @lang('lang.Size'):
                                        </label>
                                        <span class="sub_size_name">
                                        </span>
                                    </th>
                                    <td>
                                        <ul>
                                            @foreach ($sizes as $size)
                                                <li>
                                                    <input id="size_{{$size->name}}" type="raido">
                                                        <label class="size_value_check" data-placement="top" title="{{$size->name}}" data-toggle="tooltip" for="size_{{$size->name}}">
                                                            {{$size->name}}
                                                        </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        @if($Products->time_deal>Carbon\Carbon::now())
                        <div class="sidebar_deal time-dem-nguoc" data-date="{{$Products->time_deal}}" >
                            <div class="time-sale">
                                <div class="deal-text">
                                    <span>@lang('lang.HurryUpOfferendsin')</span>
                                </div>
                                <div class="countdown">
                                <div class="countdown-item">
                                <div class="countdown-digits countdown-days" id="d"></div>
                                <div class="countdown-label">@lang('lang.Day')</div>
                                </div>
                                <div class="countdown-item">
                                <div class="countdown-digits countdown-hours" id="h"></div>
                                <div class="countdown-label">@lang('lang.Hours')</div>
                                </div>
                                <div class="countdown-item">
                                <div class="countdown-digits countdown-minutes" id="m"></div>
                                <div class="countdown-label">@lang('lang.Minutes')</div>
                                </div>
                                <div class="countdown-item">
                                <div class="countdown-digits countdown-seconds" id="s"></div>
                                <div class="countdown-label">@lang('lang.Seconds')</div>
                                </div>
                                </div>
                                <div class="deal-text-down">
                                    <span>@lang('lang.Remainsuntiltheendoftheoffer')</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <p class="in-stock stock">
                            <i class="far fa-smile">
                            </i>
                            {{$Products->quantity}} @lang('lang.remainingitems')
                        </p>
                        <form action="" class="cart" enctype="multipart/form-data" method="post">
                            <div class="quantity_wrap">
                                <label class="screen-reader-text" for="quantity_62bd4779bc87d">
                                    @lang('lang.Quantity')
                                </label>
                                <div class="quantity buttons_added">
                                    <button class="minus" type="button">
                                        <i class="fal fa-minus">
                                        </i>
                                    </button>
                                    <input class="input-text qty text qty-order" id="quantity_62bd4779bc87d" max="999" min="1" name="quantity" placeholder="" step="1" title="Qty" type="number" value="1">
                                        <button class="plus"  type="button">
                                            <i class="fal fa-plus">
                                            </i>
                                        </button>
                                </div>
                            </div>
                            <a href="javascript:;" class="single_add_to_cart_button button alt add-to-cart" data-product_id="{{$Products->id}}" name="add-to-cart" type="submit" value="147">
                                <i class="fal fa-shopping-cart">
                                </i>
                                @lang('lang.Addtocart')
                            </a>
                            <a href="javascript:;" class="woosw-btn add-wish woosw-btn-147" data-id="{{$Products->id}}">
                                <i class="fal fa-heart">
                                </i>
                            </a>
                            <button class="woosc-btn woosc-btn-147 " data-id="147">
                                <i class="fal fa-code">
                                </i>
                            </button>
                        </form>
                        <div class="product-extra">
                            <section>
                                <span>
                                    <i class="fal fa-shopping-cart">
                                    </i>
                                </span>
                                <strong>
                                    Other people want this.
                                </strong>
                                <span>
                                    15 people have this in their carts right now.
                                </span>
                            </section>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                @lang('lang.Categories'):
                                @foreach ($Products->category as $cat)
                                    <a href="{{route('product_cat', $cat->slug)}}" rel="tag">
                                        {{$cat->name}}.
                                    </a>
                                @endforeach
                            </span>
                        </div>
                        <div class="social-share">
                            <span class="social-share-header">
                                @lang('lang.Share'):
                            </span>
                            <a class="social-facebook" href="#" target="_blank" title="Share on facebook">
                                <i class="fab fa-facebook-f" style="color: #4267B2">
                                </i>
                            </a>
                            <a class="social-twitter" href="#">
                                <i class="fab fa-twitter" style="color: #1DA1F2">
                                </i>
                            </a>
                            <a class="social-linkedin" href="#" target="_blank" title="Share on LinkedIn">
                                <i class="fab fa-linkedin-in" style="color:  #0A66C2;">
                                </i>
                            </a>
                            <a class="social-google" href="#" title="Share on Google plus">
                                <i class="fab fa-google-plus-g">
                                </i>
                            </a>
                            <a class="social-pinterest" href="#" target="_blank" title="Share on Pinterest">
                                <i class="fab fa-pinterest-p" style="color:#E60023;">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inforeview">
                <div class="">
                    <div class="tabs">
                        <ul>
                            <li class="tab-product-info decription_title active" data-tab="decription">
                                <a class="tab_description" href="#tab-description">
                                    @lang('lang.Description')
                                </a>
                            </li>
                            <li class="tab-product-info Additional_information_title" data-tab="Additional_information">
                                <a class="tab_Additional_information" href="#tab-Additional_information">
                                    @lang('lang.Additionalinformation')
                                </a>
                            </li>
                            <li class="tab-product-info vender_title" data-tab="vender">
                                <a class="tab_vender" href="#tab-Vender">
                                    @lang('lang.VenderInfo')
                                </a>
                            </li>
                            <li class="tab-product-info reviews_title" data-tab="reviews">
                                <a class="tab_reviews @if(Session::has('success')) borderbottom_tabs @endif" href="#tab_reviews">
                                    @lang('lang.reviews')
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="subtabs">
                        <ul>
                            <li id="subdecription" style="@if(Session::has('success')) display: none; @endif">
                                <div class="row">
                                <div class="col-12 col-md-8" style="margin-left: auto;margin-right: auto;width: 70%;">
                                        {!! $Products->content !!}
                                </div>
                                </div>
                            
                            </li>
                            <li id="subAdditional_information" style="@if(Session::has('success')) display: none; @endif">
                                <table>
                                    <tbody>
                                        @if($property !=null)
                                        @foreach($property as $key => $val)
                                        <tr>
                                            <th class="font_th" style="width:20%">
                                                <span>
                                                   {{ $key }}
                                                </span>
                                            </th>
                                            <td>
                                                <span>
                                                    {{ $val}}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </li>
                            <li id="subvenderinfo" style="@if(Session::has('success')) display: none; @endif">
                                <ul class="list-unstyled">
                                    <li class="store-name">
                                        <span class="titlevender">
                                            @lang('lang.StoreName'):
                                        </span>
                                        <span class="details">
                                            Esthershop
                                        </span>
                                    </li>
                                    <li class="seller-name">
                                        <span class="titlevender">
                                            @lang('lang.Vendor'):
                                        </span>
                                        <span class="details">
                                            <a href="https://demo2.wpopal.com/digitaz/store/huongdo/" style="text-decoration: none;">
                                                Esthershop
                                            </a>
                                        </span>
                                    </li>
                                    <li class="store-address">
                                        <span class="titlevender">
                                            <b>
                                                @lang('lang.Address'):
                                            </b>
                                        </span>
                                        <span class="details">
                                            GA
                                        </span>
                                    </li>
                                    <li class="clearfix">
                                        <div class="rating2">

                                            <div class="rating-upper" style="width: {{$Products->count_vote()}}%">
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
                                        <span style="font-size:14px; font-family: heebo; color: var(--text);">
                                            4.30 rating from 30 reviews
                                        </span>
                                    </li>
                                </ul>
                            </li>
                            <li id="subreviewsinfo" style="@if(Session::has('success')) display: block; @endif">
                                <div id="comments">
                                    <ol class="commentlist">
                                        @foreach ($Products->votes as $item)
                                            <li class="review even thread-even depth-1" id="li-comment-112">
                                                <div class="comment_container" id="comment-112">
                                                    <img alt="" class="avatar avatar-60 photo lazyloaded" height="60" src="https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=60&d=mm&r=g" width="60">
                                                        <div class="comment-text">
                                                            <div class="rating2">
                                                                <div class="rating-upper" style="width: {{($item->level)*20}}%">
                                                                    <span>
                                                                        <i class="fas fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fas fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fas fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fas fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fas fa-star">
                                                                        </i>
                                                                    </span>
                                                                </div>
                                                                <div class="rating-lower">
                                                                    <span>
                                                                        <i class="fal fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fal fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fal fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fal fa-star">
                                                                        </i>
                                                                    </span>
                                                                    <span>
                                                                        <i class="fal fa-star">
                                                                        </i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="name_cutomer_comment">
                                                                    {{$item->name_user}}
                                                                </strong>
                                                                <span class="woocommerce-review__dash">
                                                                    –
                                                                </span>
                                                                <time class="woocommerce-review__published-date" datetime="2022-04-14T08:20:50+00:00">
                                                                    {{\App\Helpers\CommonHelper::convertDateToDMY($item->created_at)}}
                                                                </time>
                                                            </p>
                                                            <div class="description">
                                                                {{$item->comment}}
                                                            </div>
                                                        </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        <div id="comment-ajax"></div>
                                    </ol>
                                </div>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div class="comment-respond" id="respond">
                                            <form class="comment-form" id="commentform" method="post">
                                                <p class="comment-notes">
                                                    <span id="email-notes">
                                                        @lang('lang.Youremailaddresswillnotbepublished').
                                                    </span>
                                                    <span aria-hidden="true" class="required-field-message">
                                                        @lang('lang.Requiredfieldsaremarked')
                                                        <span aria-hidden="true" class="required">
                                                            *
                                                        </span>
                                                    </span>
                                                </p>
                                                <div class="comment-form-rating">
                                                    <label for="rating" style="margin-right: 20px;">
                                                        @lang('lang.Yourrating')
                                                        <span class="required">
                                                            *
                                                        </span>
                                                    </label>
                                                    <div id="rating">
                                                        <input id="star1" name="rating" class="check-rate" type="radio" value="5">
                                                        <label class="full" for="star1">
                                                        </label>
                                                        <input id="star2" name="rating" class="check-rate" type="radio" value="4">
                                                        <label class="full" for="star2">
                                                        </label>
                                                        <input id="star3" name="rating" class="check-rate" type="radio" value="3">
                                                        <label class="full" for="star3">
                                                        </label>
                                                        <input id="star4" name="rating" class="check-rate" type="radio" value="2">
                                                        <label class="full" for="star4">
                                                        </label>
                                                        <input id="star5" name="rating" class="check-rate" type="radio" value="1">
                                                        <label class="full" for="star5">
                                                        </label>
                                                    </div>
                                                </div>

                                                <div style="display: flex; padding: 0 10px">
                                                    <p class="comment-form-author">
                                                        <input id="author" name="author" placeholder="@lang('lang.Name') *" size="30" type="text" value="" required>
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <input id="email" name="email" placeholder="@lang('lang.Email') *" size="30" type="email" value="" required>
                                                    </p>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <textarea cols="45" id="comment" name="comment" placeholder="@lang('lang.Yourreview') *" rows="8" required></textarea>
                                                </p>

                                                <p class="comment-form-cookies-consent">
                                                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                                        <label for="wp-comment-cookies-consent">
                                                             @lang('lang.SavemynameemailandwebsiteinthisbrowserforthenexttimeIcomment').
                                                        </label>
                                                </p>
                                                <p class="form-submit">
                                                    <input type="hidden" name="comment_product" id="comment_product" value="{{$Products->id}}">
                                                    <input  id="comment_parent" name="comment_parent" type="hidden" value="0">
                                                    <a href="javascript:;" class="submit btn btn-primary" id="submit-comment">@lang('lang.Submit')</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <section class="related products">
                <h2>
                    @lang('lang.Relatedproducts')
                </h2>
                <div class="digitaz-products-border ">
                    <ul class="products columns-4">
                        @php $z_index = 9999 @endphp
                        @foreach ($product_related as $item)
                        <li class="product-style-default product type-product post-137 status-publish first instock product_cat-accessories product_cat-mobile-tablets has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                            <div class="product-block" style="z-index:{{$z_index}} ">

                               @php $z_index = $z_index-1 @endphp
                               <a href="{{route('detailproduct', $item->slug)}}">
                                <div class="content-product-imagin">
                                </div>
                                <div class="product-header">
                                    <div class="posted-in">
                                        @foreach ($item->category as $cat)
                                        <a href="{{route('product_cat', $cat->slug)}}" rel="tag">
                                            {{$cat->name}}
                                        </a>.
                                        @endforeach
                                    </div>
                                    <h3 class="woocommerce-loop-product__title">
                                        <a href="{{route('detailproduct', $item->slug)}}">
                                            {{$item->name}}
                                        </a>
                                    </h3>
                                </div>
                                <div class="product-transition">
                                @if(!empty($item->onsale))
                                    <span class="onsale">-{{$item->onsale}}%</span>
                                @endif
                                <div class="product-image">
                                    <a href="{{route('detailproduct', $item->slug)}}" style="display: block;">
                                        <img class="attachment-shop_catalog size-shop_catalog lazyloaded" data-ll-status="loaded" height="369" src="{{asset('upload/images/products/medium').'/'.$item->thumb}}">
                                    </a>
                                </div>
                                 <div class="group-action top">
                                    <div class="shop-action vertical">
                                        <button class="woosw-btn add-wish-2" data-id="{{$item->id}}">Add to wishlist</button>
                                        <a href="{{asset('upload/images/products/large').'/'.$item->thumb}}" class="woosq-btn">Quick view</a>
                                        <button class="woosc-btn">Compare</button>
                                    </div>
                                </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-caption-top">
                                        <span class="price">
                                            @if (!empty($item->onsale))
                                                <del aria-hidden="true">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            {{number_format($item->price,0,',','.')}}
                                                            <span class="woocommerce-Price-currencySymbol">
                                                                @lang('lang.Currencyunit')
                                                            </span>
                                                        </bdi>
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            {{number_format($item->price_onsale,0,',','.')}}
                                                            <span class="woocommerce-Price-currencySymbol">
                                                                @lang('lang.Currencyunit')
                                                            </span>
                                                        </bdi>
                                                    </span>
                                                </ins>
                                            @else
                                                <del aria-hidden="true">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">
                                                            </span>
                                                        </bdi>
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            {{number_format($item->price,0,',','.')}}
                                                            <span class="woocommerce-Price-currencySymbol">
                                                                @lang('lang.Currencyunit')
                                                            </span>
                                                        </bdi>
                                                    </span>
                                                </ins>
                                            @endif

                                        </span>
                                        <div class="count-review t-line">
                                            <span class="sub_rating">
                                                ({{$item->votes->count()}} @lang('lang.Review'))
                                            </span>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption-bottom qty">
                                    <div class="product-input-quantity">
                                        <div class="quantity_wrap">
                                            <label class="screen-reader-text" for="quantity_62bd4779bc87d">
                                            </label>
                                            <div class="quantity buttons_added">
                                                <button class="minus" type="button">
                                                    <i class="fal fa-minus">
                                                    </i>
                                                </button>
                                                <input class="input-text qty text qty-order" id="quantity_62bd4779bc87d" max="999" min="1" name="quantity" placeholder="" step="1" title="Qty" type="number" value="1">
                                                    <button class="plus" type="button">
                                                        <i class="fal fa-plus">
                                                        </i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="addcart add-to-cart-2" href="javascript:;" data-product_id="{{$item->id}}">
                                        <button>
                                            <i class="far fa-shopping-cart">
                                            </i>
                                        </button>
                                    </a>
                                </div>
                                 </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <p id="message_add_cart" style="display:none;">@lang('lang.Productaddedtocartsuccessfully')</p>
    <p id="Youhavenotfilledinthecommentsreviews" style="display:none;">@lang('lang.Youhavenotfilledinthecommentsreviews')</p>
    <p id="Younotyetrating" style="display:none;">@lang('lang.Younotyetrating')</p>
    <p id="Nameisempty" style="display:none;">@lang('lang.Nameisempty')</p>
    <p id="Emailisempty" style="display:none;">@lang('lang.Emailisempty')</p>
    @endsection

    @section('footer')
        @include('frontend.layouts.footer')
    @endsection

    @section('js')
        <script>
            $(document).ready(function(){
                var mess = document.getElementById('message_add_cart').innerHTML;
                var mess2 = document.getElementById('Youhavenotfilledinthecommentsreviews').innerHTML;
                var mess3 = document.getElementById('Younotyetrating').innerHTML;
                var mess4 = document.getElementById('Nameisempty').innerHTML;
                var mess5 = document.getElementById('Emailisempty').innerHTML;
                //Add to Cart
                $('.add-to-cart').click(function(){
                    var id = $(this).data('product_id');
                    var qty = $('.qty-order').val();
                    var _token = $('meta[name="csrf-token"]').attr('content');
                            var data = {
                                id: id,
                                qty: qty,
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
                });
                //Add to Cart
                $('.add-to-cart-2').click(function(){
                    var id = $(this).data('product_id');
                    var qty = $(this).parent('.product-caption-bottom').children('.qty-order').val();
                    var _token = $('meta[name="csrf-token"]').attr('content');
                            var data = {
                                id: id,
                                qty: qty,
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
                });

                //Comment
                $('#submit-comment').click(function(){
                    var rating = $(".check-rate:checked").val();
                    var author = $("#author").val();
                    var email = $("#email").val();
                    var comment = $("#comment").val();
                    var id = $("#comment_product").val();
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    var data = {rating: rating, author: author, email:email, comment:comment, id:id, _token:_token};
                    if ($.trim(rating) == ''){
                        alert(mess3);
                        return false;
                    }
                    if ($.trim(author) == ''){
                        alert(mess4);
                        return false;
                    }
                    if ($.trim(email) == ''){
                        alert(mess5);
                        return false;
                    }
                    if ($.trim(comment) == ''){
                        alert(mess2);
                        return false;
                    }
                    $.ajax({
                        url: "{{route('commentProduct')}}",
                        method: 'POST',
                        data: data,
                        dataType: "json",
                        success: function(data) {
                            $("#comment-ajax").append(data);
                            $("#commentform")[0].reset();
                        },
                    });
                });

         var $time = $('.time-dem-nguoc').attr('data-date');
        var countDownDate = new Date($time).getTime();
        if(countDownDate){
            // cập nhập thời gian sau mỗi 1 giây
            var x = setInterval(function() {

                // Lấy thời gian hiện tại
                var now = new Date().getTime();

                // Lấy số thời gian chênh lệch
                var distance = countDownDate - now;

                // Tính toán số ngày, giờ, phút, giây từ thời gian chênh lệch
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                // HIển thị chuỗi thời gian trong thẻ
                if (days > 0)
                    document.getElementById("d").innerHTML = days;
                if (hours < 10)
                    document.getElementById("h").innerHTML = '0'+ hours;
                else
                    document.getElementById("h").innerHTML = hours;
                if (minutes <10 )
                    document.getElementById("m").innerHTML = '0'+ minutes;
                else
                    document.getElementById("m").innerHTML = minutes;

                if (seconds < 10)
                    document.getElementById("s").innerHTML = '0'+ seconds;
                else
                    document.getElementById("s").innerHTML = seconds;
            }, 1000);
        }

            $('.add-wish').click(function(){
                var id = $(this).data('id');
                var _token = $('meta[name="csrf-token"]').attr('content');
                var data = {id:id, _token:_token};
                $.ajax({
                    url: "{{route('add_wish')}}",
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        alert('Thêm thành công sản phẩm vào danh sách yêu thích!');
                        $('.add-wish').html(data.heart);
                        $('#count-wish').text(data.count_wish);
                    },
                });
            });
            $('.add-wish-2').click(function(){
                var id = $(this).data('id');
                var _token = $('meta[name="csrf-token"]').attr('content');
                var data = {id:id, _token:_token};
                $.ajax({
                    url: "{{route('add_wish')}}",
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        alert('Thêm thành công sản phẩm vào danh sách yêu thích!');
                        $('#count-wish').text(data.count_wish);
                    },
                });
            });
        });
    </script>
@endsection


