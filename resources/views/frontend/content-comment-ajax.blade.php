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
