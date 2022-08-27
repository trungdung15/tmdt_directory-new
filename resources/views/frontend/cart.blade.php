@extends('frontend.layouts.base')

@section('title')
    <title>@lang('lang.It24hcart')</title>
@endsection

@section('css')
    <link rel="stylesheet" href="asset/css/user/register.css">
    <link rel="stylesheet" href="asset/css/cart.css">
    <link rel="stylesheet" href="asset/css/style_body.css">
    <style>
        
    </style>
@endsection

@section('header')
    @include('frontend.layouts.header-page', [$Sidebars, $Menus])
@endsection

@section('menu-mobile')
    @include('frontend.layouts.menu-mobile', [$Sidebars, $Menus])
@endsection

@section('content')
    <div class="breadcrumb-wrap container-wp">
        <section class="breadcrumb">
            <div class="breadcrumb_default">
                <div class="breadcrumb_populated">
                    <div class="breadcrumb_title">@lang('lang.Cart')</div>
                    <nav class="breadcrumb_list">
                        <a href="{{route('user')}}">@lang('lang.Home')</a>
                        <i class="fas fa-angle-right"></i>
                        @lang('lang.Cart')
                    </nav>
                </div>
            </div>
        </section>
    </div>
    <div id="content">
        <div class="container-wp container-wp-remove">
            @if (Cart::count()>0)
            <div class="row" id="cart-empty">
                <div class="col-12 col-lg-8">
                    <div class="wp-cart-table">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                        <table class="table-cart">
                            <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name">@lang('lang.Product')</th>
                                    <th class="product-price">@lang('lang.Price')</th>
                                    <th class="product-quantity">@lang('lang.Quantity')</th>
                                    <th class="product-subtotal">@lang('lang.Subtotal')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $row)
                                <tr class="cart-item" id="item-{{$row->rowId}}">
                                    <td class="product-remove">
                                        <a href="javascript:;" class="remove-cart" data-rowid="{{$row->rowId}}" onclick="return confirm('@lang('lang.Areyousureremoveproduct')')"><i class="fal fa-times"></i></a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="@php
                                            foreach($product_carts as $item){
                                                if($item->id == $row->id){
                                                    echo route('detailproduct', $item->slug);
                                                }
                                            }
                                        @endphp">
                                            <img width="300" height="300" src="upload/images/products/thumb/{{$row->options->thumbnail}}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="@php
                                        foreach($product_carts as $item){
                                            if($item->id == $row->id){
                                                echo route('detailproduct', $item->slug);
                                            }
                                        }
                                    @endphp">{{$row->name}}</a>
                                    </td>
                                    <td class="product-price">
                                    <span class="title">@lang('lang.Price')</span>
                                        <span>
                                            {{ number_format($row->price, 0, '', '.') }} đ
                                        </span>
                                    </td>
                                    <td class="product-quantity">
                                    <span class="title">@lang('lang.Quantity')</span>
                                    <div class="quantity">
                                        <button type="button" class="change-qty" data-value="-1" data-rowid="{{ $row->rowId }}" data-id="{{ $row->id }}"><i class="fas fa-minus"></i></button>
                                        <input type="number" class="qty number-order-{{$row->id}}" min="1" max="999" name="qty[{{ $row->rowId }}]"
                                        value="{{$row->qty}}">
                                        <button type="button" class="change-qty" data-value="1" data-rowid="{{ $row->rowId }}" data-id="{{ $row->id }}"><i class="fas fa-plus"></i></button>
                                    </div>
                                    </td>
                                    <td class="product-subtotal">
                                    <span class="title">@lang('lang.Subtotal')</span>
                                    <span class="subtotal"><span class="subtotal-{{$row->id}}">{{ number_format($row->subtotal, 0, '', '.') }}</span> <strong>đ</strong></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="actions clearfix">
                            <form action="" class="coupon">
                                <input type="text" class="input-text" placeholder="@lang('lang.Couponcode')">
                                <button class="btn-submit">@lang('lang.ApplyCoupon')</button>
                            </form>
                            <button type="submit" class="btn-update">@lang('lang.UpdateCart')</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart-total">
                            <h2>@lang('lang.Carttotals')</h2>
                            <div class="subtotal">
                                <span>@lang('lang.Subtotal')</span>
                                <span class="count-subtotal"><span>{{ Cart::subtotal(0, '', '.')}} </span> <strong>@lang('lang.Currencyunit')</strong></span>
                            </div>
                            <div class="total">
                                <span>@lang('lang.Subtotal')</span>
                                <span class="count-total"><span>{{ Cart::subtotal(0, '', '.')}}</span> <strong>@lang('lang.Currencyunit')</strong></span>
                            </div>
                            <a href="{{route('checkout')}}" class="checkout text-center">@lang('lang.Proceedtocheckout')</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                <div class="cross-sells">
                    <h2>@lang('lang.Youmaybeinterestedin')</h2>
                    <div class="wp-list-product">
                    <div class="body_products">
                        <div class="products_default">
                            <div class="products_border">
                                <div id="product-trend" class="owl-carousel owl-theme">
                                    @if ($products->count()>0)
                                        @foreach ($products as $item)
                                        <div class="product_style-default">
                                            <div class="product-block">
                                                <div class="product-header">
                                                    <div class="posted-in">
                                                        @foreach ($item->category as $cat)
                                                        <a href="{{route('product_cat', $cat->slug)}}">
                                                            @if($locale =='vi'){{$cat->name}}
                                                            @else {{$cat->name2}}
                                                            @endif
                                                        </a>,
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
                                                        <img width="300" height="300" src="upload/images/products/medium/{{$item->thumb}}">
                                                    </div>
                                                    <a href="{{route('detailproduct', $item->slug)}}" class="product_link"></a>
                                                </div>
                                                <div class="product-caption">
                                                    <div class="product-caption-top">
                                                    <span class="price">
                                                        @if(!empty($item->onsale))
                                                            <del>{{number_format($item->price,0,',','.')}} đ</del>
                                                            <ins>{{number_format($item->price_onsale,0,',','.')}} đ</ins>
                                                        @else
                                                            {{number_format($item->price,0,',','.')}} đ
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
                                                        <a href="{{route('add_cart', $item->id)}}" class="add_to_cart_button"><i class="far fa-shopping-cart"></i>@lang('lang.Addtocart')</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="entry-content">
                    <p class="cart-empty">
                        <i class="fad fa-shopping-cart"></i><br>
                        @lang('lang.Yourcartiscurrentlyempty').
                    </p>
                    <a href="{{route('user')}}"> @lang('lang.Returntoshop')</a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    @include('frontend.layouts.footer')
@endsection

@section('js')
    <script>
        $('#product-trend').owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            dots:false,
            autoplay:true,
            autoplayTimeout:3500,
            responsive:{
                0:{
                    items:1
                },
                300:{
                    items:2
                },
                600:{
                    items:3
                },

            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.remove-cart').click(function(){
                var row_id = $(this).data('rowid');
                var _token = $('meta[name="csrf-token"]').attr('content');
                var data = {
                        row_id: row_id,
                        _token: _token
                    };
                    $.ajax({
                        url: "{{ route('remove_cart') }}",
                        method: 'POST',
                        data: data,
                        dataType: "json",
                        success: function(data) {
                            alert('Xóa thành công!');
                            if(data.count_cart == 0){
                                $('#cart-empty').remove();
                                $('.container-wp-remove').html(data.html_empty);
                            }else{
                                $('#item-'+row_id).remove();
                                $('.count-subtotal span').html(data.total);
                                $('.count-total span').html(data.total);
                            }
                            $('#count-cart').text(data.count_cart);
                        },
                    });
            });

            $('.change-qty').click(function(){
                var change_number = $(this).data('value');
                var id = $(this).data('id');
                var qty_old = $('.number-order-'+id).val();
                var row_id = $(this).data('rowid');
                var _token = $('meta[name="csrf-token"]').attr('content');
                var data = {
                        change_number: change_number,
                        qty_old: qty_old,
                        row_id: row_id,
                        _token: _token
                    };
                    $.ajax({
                        url: "{{ route('update_ajax') }}",
                        method: 'POST',
                        data: data,
                        dataType: "json",
                        success: function(data) {
                            $('.number-order-'+id).val(data.qty);
                            $('.subtotal-'+id).html(data.subtotal);
                            $('.count-subtotal span').html(data.subtotal_cart);
                            $('.count-total span').html(data.subtotal_cart);
                        },
                    });
            });
        });
    </script>
@endsection
