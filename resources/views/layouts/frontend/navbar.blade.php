<!-- banner -->
<div class="ban-top">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search"
                            style="float: right; color:white">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav menu__list">
                        <!--menu__item--current 類別名稱 正在訪問的頁面-->
                    <!--                            <li class="active menu__item"><a class="menu__link" href="{{url('/')}}">首頁 <span class="sr-only">(current)</span></a></li>
                        <li class=" menu__item"><a class="menu__link" href="{{url('about')}}">關於</a></li>-->
                        <li class="menu__item"><a class="menu__link" href="{{url('limit_commodities_page')}}">限時商品</a>
                        </li>
                        <li class="dropdown menu__item">
                            <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">全部商品<span class="caret"></span></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="agile_inner_drop_nav_info">
                                    @foreach($topCategoriesGroup as $topCates)
                                        <div class="col-sm-4 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach($topCates as $topCate)
                                                    <li>
                                                        <a href="{{url('category/' . $topCate->cate_id . '?topCateId=' . $topCate->cate_id)}}">{{$topCate->cate_name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                    <!--                            <li class="dropdown menu__item">
                                                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men's wear <span class="caret"></span></a>
                                                        <ul class="dropdown-menu multi-column columns-3">
                                                            <div class="agile_inner_drop_nav_info">
                                                                <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                                                    <a href="{{url('mens')}}"><img src="images/top2.jpg" alt=" "/></a>
                                                                </div>
                                                                <div class="col-sm-3 multi-gd-img">
                                                                    <ul class="multi-column-dropdown">
                                                                        <li><a href="{{url('mens')}}">Clothing</a></li>
                                                                        <li><a href="{{url('mens')}}">Wallets</a></li>
                                                                        <li><a href="{{url('mens')}}">Footwear</a></li>
                                                                        <li><a href="{{url('mens')}}">Watches</a></li>
                                                                        <li><a href="{{url('mens')}}">Accessories</a></li>
                                                                        <li><a href="{{url('mens')}}">Bags</a></li>
                                                                        <li><a href="{{url('mens')}}">Caps & Hats</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-3 multi-gd-img">
                                                                    <ul class="multi-column-dropdown">
                                                                        <li><a href="{{url('mens')}}">Jewellery</a></li>
                                                                        <li><a href="{{url('mens')}}">Sunglasses</a></li>
                                                                        <li><a href="{{url('mens')}}">Perfumes</a></li>
                                                                        <li><a href="{{url('mens')}}">Beauty</a></li>
                                                                        <li><a href="{{url('mens')}}">Shirts</a></li>
                                                                        <li><a href="{{url('mens')}}">Sunglasses</a></li>
                                                                        <li><a href="{{url('mens')}}">Swimwear</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown menu__item">
                                                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Women's wear <span class="caret"></span></a>
                                                        <ul class="dropdown-menu multi-column columns-3">
                                                            <div class="agile_inner_drop_nav_info">
                                                                <div class="col-sm-3 multi-gd-img">
                                                                    <ul class="multi-column-dropdown">
                                                                        <li><a href="{{url('womens')}}">Clothing</a></li>
                                                                        <li><a href="{{url('womens')}}">Wallets</a></li>
                                                                        <li><a href="{{url('womens')}}">Footwear</a></li>
                                                                        <li><a href="{{url('womens')}}">Watches</a></li>
                                                                        <li><a href="{{url('womens')}}">Accessories</a></li>
                                                                        <li><a href="{{url('womens')}}">Bags</a></li>
                                                                        <li><a href="{{url('womens')}}">Caps & Hats</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-3 multi-gd-img">
                                                                    <ul class="multi-column-dropdown">
                                                                        <li><a href="{{url('womens')}}">Jewellery</a></li>
                                                                        <li><a href="{{url('womens')}}">Sunglasses</a></li>
                                                                        <li><a href="{{url('womens')}}">Perfumes</a></li>
                                                                        <li><a href="{{url('womens')}}">Beauty</a></li>
                                                                        <li><a href="{{url('womens')}}">Shirts</a></li>
                                                                        <li><a href="{{url('womens')}}">Sunglasses</a></li>
                                                                        <li><a href="{{url('womens')}}">Swimwear</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                                                    <a href="{{url('womens')}}"><img src="images/top1.jpg" alt=" "/></a>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </ul>
                                                    </li>-->
                    <!--                            <li class="menu__item dropdown">
                                                        <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Short Codes <b class="caret"></b></a>
                                                        <ul class="dropdown-menu agile_short_dropdown">
                                                            <li><a href="{{url('icons')}}">Web Icons</a></li>
                                                            <li><a href="{{url('typography')}}">Typography</a></li>
                                                        </ul>
                                                    </li>-->
                    <!--                            <li class=" menu__item"><a class="menu__link" href="{{url('contact')}}">聯絡我們</a></li>-->
                        <li class="menu__item"><a class="menu__link" href="{{url('question')}}">購物流程FAQ</a></li>
                        <li class="menu__item"><a class="menu__link" href="{{url('contact')}}">聯絡資訊</a></li>
                    </ul>
                </div>
                <div class="visible-xs">
                    <div class="collapse navbar-collapse hidden-lg" id="search">
                        <div class="input-group" style="margin-top: 20px">
                            <input id="mobilekeywordSearch" type="text" class="form-control" aria-label="..."
                                   placeholder="商品關鍵字搜尋...">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" aria-label="Help"
                                        onclick="mobileSearch()">搜尋
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!--        <div class="top_nav_right">
                <div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
                    <form action="#" method="post" class="last"> 
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="display" value="1">
                        <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </form>  
    
                </div>
            </div>-->
    <div class="clearfix"></div>
</div>
<!-- //banner-top -->
<script>
    function mobileSearch() {
        var keyword = $("#mobilekeywordSearch").val();
        if (keyword == "") {
            showModal("failModal", "提示", "請輸入關鍵字！");
            return;
        }
        window.location.href = "{{url('search')}}" + "/" + keyword;
    }
</script>
