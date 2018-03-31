<!-- header -->
<div class="header" id="home">
    <div class="col-md-4"></div>
    <div class="col-md-5">
        <ul>
            <!--            <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> 登入 </a></li>
                        <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 註冊 </a></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> 電話 : 01234567898</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>-->
            @if(!empty(session('member')))
                <li>
                    @if(empty(session('member')->member_name))
                        {{session('member')->member_account}} 您好
                    @else
                        {{session('member')->member_name}} 您好
                    @endif
                </li>
            @endif
            <li class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border: none;">
                    <i class="glyphicon glyphicon-align-justify"></i>會員專區
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="text-align: left;">
                    @if(!empty(session('member')))
                        <li style="width: 100%;"><a href="{{url('member/quit')}}">登出</li>
                        <li style="width: 100%;"><a href="{{url('member_order')}}">訂單查詢</a></li>
                        <li style="width: 100%;"><a href="{{url('member_info')}}">資料修改</a></li>
                        <li style="width: 100%;"><a href="{{url('')}}">修改密碼</a></li>
                    @else
                        <li style="width: 100%;"><a href="{{url('member_signin')}}">登錄</li>
                        <li style="width: 100%;"><a href="{{url('member_signup')}}">註冊</li>
                    @endif

                </ul>
            </li>
            <li>
                <!--                <form action="#" method="post" class="last"> 
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="display" value="1">
                                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-shopping-cart" aria-hidden="true"></i>購物車</button>
                                </form>-->
                <!--                                <a href="">-->
                <a class="agile-icon btn btn-default" style="border: none;" href="{{url('shoppingcart/show')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="shoppingCartCount">({{$cartCount}})購物車</span>
                </a>
                <!--                                </a>-->
            </li>
        </ul>
    </div>
    <div class="col-md-3" style="padding-top: 3.5px;">
        <div class="input-group">
            <input type="text" class="form-control" aria-label="...">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default" aria-label="Help">Go</button>
            </div>
        </div>
    </div>
</div>

<!-- //header -->
<!-- header-bot -->
<div class="header-bot" style="padding-top: 0px;">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <!--        <div class="col-md-4 header-middle">
                    <form action="#" method="post">
                        <input type="search" name="search" placeholder="商品關鍵字搜尋..." required="">
                        <input type="submit" value=" ">
                        <div class="clearfix"></div>
                    </form>
                </div>-->
        <div class="col-md-4 col-sm-4"></div>
        <!-- header-bot -->
        <div class="col-md-4 logo_agile col-sm-4">
            <h1><a href="{{url('/')}}"><img src="{{url('images/logo-03.png')}}" width="40%"></a></h1>
        </div>
        <!-- header-bot -->
        <!--        <div class="col-md-4 agileits-social top_content">
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                        <li class="share">分享 : </li>
                        <li><a href="#" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="twitter"> 
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                        <li><a href="#" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                    </ul>
                </div>-->
        <div class="col-md-4 col-sm-4"></div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
