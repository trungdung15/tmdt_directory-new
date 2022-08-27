
@if($type == 'trend')
    <div class="product-trend owl-carousel owl-theme">
        @foreach($product_trends as $item)
            <div class="product_style-default">
                <div class="product-block" style="z-index:99">
                    <div class="product-header">
                        <div class="posted-in">
                            @foreach($item->category as $cat)
                                <a href="{{route('product_cat', $cat->slug)}}">
                                    @if($locale =='vi') {{$cat->name}}
                                    @else {{$cat->name2}}
                                    @endif
                                </a>.
                            @endforeach
                        </div>
                        <h3 class="product-title">

                            <a href="{{ route('detailproduct', $item->slug)}}">{{$item->name}}</a>
                        </h3>
                    </div>
                    <div class="product-transition">
                        @if(!empty($item->onsale))
                            <span class="onsale">-{{$item->onsale}}%</span>
                        @endif
                        <div class="product-image">
                            <img width="300" height="300" src="{{asset('upload/images/products/medium').'/'.$item->thumb}}">
                        </div>
                        <a href="{{ route('detailproduct', $item->slug)}}" class="product_link"></a>
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
        @endforeach
    </div>
@endif
