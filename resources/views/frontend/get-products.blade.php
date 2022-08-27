<div class="owl-carousel">
    @foreach($products as $item)
        <div class="item">
            <div class="wp-product">
                <div class="content-product-imagin" style="margin-bottom: -60px"></div>
                <div class="product-header">
                    <div class="cat-product">
                        @foreach($item->category as $cat)
                            <a href="{{route('product_cat', $cat->slug)}}">
                                @if($locale =='vi') {{$cat->name}}
                                @else {{$cat->name2}}
                                @endif
                            </a>.
                        @endforeach

                    </div>
                    <div class="product-name">
                        <h3>
                            <a href="{{ route('detailproduct', $item->slug)}}">{{$item->name}}</a>
                        </h3>
                    </div>
                </div>
                <div class="product-thumb">
                    @if(!empty($item->onsale))
                    <span class="onsale">-{{$item->onsale}}%</span>
                    @endif
                    <a href="{{ route('detailproduct', $item->slug)}}">
                        <img width="300" height="300" src="{{asset('upload/images/products/medium').'/'.$item->thumb}}" alt=""/>
                    </a>
                </div>
                <div class="product-caption">
                    <div class="price">
                        @if(!empty($item->onsale))
                            <div class="old-price">{{number_format($item->price,0,',','.')}} @lang('lang.Currencyunit')</div>
                            <div class="new-price">{{number_format($item->price_onsale,0,',','.')}} @lang('lang.Currencyunit')</div>
                        @else
                            <div class="old-price"></div>
                            <div class="new-price">{{number_format($item->price,0,',','.')}} @lang('lang.Currencyunit')</div>
                        @endif
                    </div>
                    <div class="review">
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
                        <div class="count-review">({{$item->votes->count()}} @lang('lang.Review'))</div>
                    </div>
                </div>
                <a href="javascript:;" class="add-cart" onclick="add_cart({{$item->id}})"><span class="pe-2"><i class="far fa-shopping-cart"></i></span>@lang('lang.Addtocart')</a>
            </div>
        </div>
    @endforeach
</div>


