<div class="tab-content container-home" id="pills-tabContent">
    @php
            $e=0;
    @endphp
    @foreach ($cat_parent->cat_child as $cat_child)
        @php
            $e++;
        @endphp
            <div class="tab-pane fade {{($e==1) ? 'show active' : ''}}" id="pills-cat{{$cat_child->id}}" role="tabpanel" aria-labelledby="pills-cat{{$cat_child->id}}-tab">
                <div class="list-product owl-carousel owl-theme owl-loaded owl-drag list-product-group" id="list-product-group">
                    @foreach ($cat_child->get_list_product_by_cat() as $item)
                        <!-- product -->
                    <div class="product-item mb-3">
                        <div class="thumb">
                            <a href="">
                                <img class="owl-lazy" data-src="{{asset('upload/images/products/medium/'.$item->thumb)}}" alt="">
                                <span class="brand" style="background-image: url('asset/images/msi.png');"></span>
                                <div class="wp-tag">
                                    <span class="years">New 2022</span>
                                    <span class="payment">Trả góp 0%</span>
                                </div>
                            </a>
                        </div>
                        <div class="detail">
                            <div class="wp-event">
                                <p class="event" style="background: linear-gradient(to right,#ef3006,#c60004);">
                                    <img src="/asset/images/icon1-50x50.png" alt="">
                                    <span>Giảm sốc</span>
                                </p>
                            </div>
                            <div class="name">
                                <a href="">{{$item->name}}</a>
                            </div>
                            @if (!empty($item->specifications))
                                <ul class="product-attributes">
                                    @foreach ($item->get_specifications() as $k)
                                        <li>{{$k}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="price-review clearfix">
                                <div class="price">
                                    @if (!empty($item->onsale))
                                        <span class="onsale">- {{$item->onsale}}%</span>
                                        <div class="price-old">{{number_format($item->price,0,',','.')}} đ</div>
                                        <div class="price-new">{{number_format($item->price_onsale,0,',','.')}} đ</div>
                                    @else
                                        <div class="price-new">{{number_format($item->price,0,',','.')}} đ</div>
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
                                    <div class="count-review">({{$item->votes->count()}})</div>
                                    @if (!empty($item->sold))
                                        <div class="sold"><i class="fas fa-badge-check"></i>Đã bán {{$item->sold}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="detail-bottom">
                                <div class="qty" style="color: #01aa42;
                                background-color: #dbf8e1;">Còn hàng</div>
                                <div class="action">
                                    <a href="" class="repeat" title="So sánh"><i class="far fa-repeat"></i></a>
                                    <a href="" class="heart" title="Lưu sản phẩm"><i class="far fa-heart"></i></a>
                                    <a href="" title="Thêm vào giỏ hàng"><i class="far fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
    @endforeach
</div>
