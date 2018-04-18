<style>
    .commodity_subtitle {
        padding-left: 5px;
        padding-right: 5px;
        text-align: center;
        font-size: 12px;
        height: 15px;
        color: #e71d1c;
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .commodity_title {
        word-break: break-all;
        height: 55px;
        text-align: left;
        padding-left: 5px;
        padding-right: 5px;
        margin-top: 0;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    @media (max-width: 480px) {
        .commodity_title {
            height: 75px;
        }
    }
</style>
@forelse($commodities as $key => $commodity)
    <div class="col-xs-6 col-sm-3 col-md-3 product-men">
        <div class="men-pro-item simpleCart_shelfItem">
            <div class="men-thumb-item">
                <img src="{{url(''.$commodity->commodity_image)}}" alt="{{$commodity->commodity_title}}"
                     class="pro-image-front" onError="this.src='{{$errorImgUrl}}'">
                <img src="{{url(''.$commodity->commodity_image)}}" alt="{{$commodity->commodity_title}}"
                     class="pro-image-back" onError="this.src='{{$errorImgUrl}}'">
                <div class="men-cart-pro">
                    <div class="inner-men-cart-pro">
                        <a href="{{url('commodity/'. $commodity->commodity_id)}}" class="link-product-add-cart">查看商品</a>
                    </div>
                </div>
                <span class="product-new-top">新</span>

            </div>
            <div class="item-info-product ">
                <p class="commodity_subtitle">{{$commodity->commodity_subtitle}}</p>
                <h4 class="commodity_title">
                    <a href="{{url('commodity/'. $commodity->commodity_id)}}">{{$commodity->commodity_title}}</a>
                </h4>
                <div class="info-product-price">
                    {{--<div>--}}
                    {{--<del>售價$69.71</del>--}}
                    {{--</div>--}}
                    <div class="item_price">
                        預購價 <span>${{$commodity->commodity_price}}</span>
                    </div>
                </div>
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                    <input type="button" value="立即預購" class="button"
                           onclick="showChooseSpecDialog({{$commodity->commodity_id}})"/>
                </div>
            </div>
            <div style="text-align: center;">剩餘組數 {{$commodity->commodity_stock}}</div>
            <div style="text-align: center; font-size: 12px">目前{{$commodity->online}}人正在瀏覽</div>
        </div>
    </div>
@empty
    <div style="margin-top: 20px; text-align: center;">查無商品！</div>
@endforelse