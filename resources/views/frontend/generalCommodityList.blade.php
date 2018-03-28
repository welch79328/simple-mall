@forelse($generalCommodities as $general)
<div class="col-md-3 product-men">
    <div class="men-pro-item simpleCart_shelfItem">
        <div class="men-thumb-item">
            <img src="{{url(''.$general->commodity_image)}}" alt="" class="pro-image-front" onError="this.src='{{$errorImgUrl}}'">
            <img src="{{url(''.$general->commodity_image)}}" alt="" class="pro-image-back" onError="this.src='{{$errorImgUrl}}'">
            <div class="men-cart-pro">
                <div class="inner-men-cart-pro">
                    <a href="{{url('commodity/'. $general->commodity_id)}}" class="link-product-add-cart">查看商品</a>
                </div>
            </div>
            <span class="product-new-top">新</span>

        </div>
        <div class="item-info-product ">
            <h4><a href="{{url('single')}}">{{$general->commodity_title}}</a></h4>
            <div class="info-product-price">
                <div>
                    <del>售價$69.71</del>
                </div>
                <div class="item_price">
                    預購價 <span>${{$general->commodity_price}}</span>
                </div>
            </div>
            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                <input type="button" value="立即預購" class="button" onclick="addToShoppingCart(this);"/>
                <input type="hidden" value="{{$general->commodity_id}}"/>
            </div>
        </div>
        <div style="text-align: center;">剩餘組數  {{$general->commodity_stock}}</div>
    </div>
</div>
@empty
<div>查無商品！</div>
@endforelse