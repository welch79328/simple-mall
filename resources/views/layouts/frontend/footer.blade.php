<style>
    .adwifi_footer {
        color: white;
        font-family: Microsoft JhengHei;
    }

    .footer_title {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .footer_title_mobile {
        padding-top: 20px;
        padding-bottom: 10px;
        font-size: 18px;
    }

    .footer_div_1 {
        background-color: #0c68ab;
        padding-bottom: 30px;
        height: 100%;
    }

    .footer_div_2 {
        background-color: #0c68ab;
        padding-top: 10px;
        padding-bottom: 30px;
        height: 100%;
    }

    .footer_div_mobile {
        background-color: #0c68ab;
        padding-top: 30px;
        padding-bottom: 30px;
        font-size: 12px;
    }

    .footer_detail > div {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .footer_detail > div > a {
        color: white;
    }

    .footer_copyright {
        color: black;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 12px;
        font-weight: bold;
    }

    .blankSpaceDiv {
        height: 8vh;
    }
</style>
<!-- footer -->
<div class="adwifi_footer hidden-xs" style="height: 250px">
    <div class="col-sm-3 col-md-4 footer_div_2">
        <div class="col-sm-12 col-md-9 col-md-offset-3" style="border-right-style: solid; border-width: thin;">
            <div>
                <img src="{{url('images/frontend/J-UGO-footer.png')}}" width="120px">
            </div>
            <div class="center-block text-left footer_detail">
                <div>02-7709-1239</div>
                <div>jugomallservice@gmail.com</div>
                <div>客服時間：周一至周五09:00-18:00</div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 footer_div_1">
        <div class="col-sm-12 col-md-10 col-md-offset-2">
            <h3 class="footer_title">關於我們</h3>
            <div class="center-block text-left footer_detail">
                <div><a href="{{url('about')}}">關於J-UGo</a></div>
                <div><a href="{{url('privacy')}}">隱私權保護政策</a></div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-2 footer_div_1">
        <div class="col-sm-12 col-md-11 col-md-offset-1">
            <h3 class="footer_title" style="padding-bottom: 0">關係企業</h3>
            <div class="center-block text-left footer_detail" style="margin-bottom: 0">
                <a href="http://www.adwifi.com.tw/">
                    <img src="{{url('images/frontend/free ad wifi-01.png')}}" width="60px">
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-md-3 footer_div_1">
        <div class="col-sm-12 col-md-10 col-md-offset-2">
            <h3 class="footer_title">追蹤我們</h3>
            <div class="center-block text-left footer_detail">
                <div>
                    <a href="https://www.facebook.com/JUGOmall/" style="margin-right: 10px;">
                        <img src="{{url('images/frontend/facebook.png')}}" width="30px">
                    </a>
                    <a href="https://line.me/R/ti/p/%40tbk0394m">
                        <img src="{{url('images/frontend/line.png')}}" width="35px">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile footer -->
<div class="adwifi_footer visible-xs col-xs-12" style="background-color: #0c68ab;">
    <div class="col-xs-8 col-xs-offset-4 footer_div_mobile">
        <h3 class="footer_title_mobile">關於我們</h3>
        <div class="center-block text-left footer_detail">
            <div><a href="{{url('about')}}">關於J-UGo</a></div>
            <div><a href="{{url('privacy')}}">隱私權保護政策</a></div>
        </div>
        <h3 class="footer_title_mobile" style="margin-top: 20px; padding-bottom: 0">關係企業</h3>
        <div class="center-block text-left footer_detail">
            <a href="http://www.adwifi.com.tw/">
                <img src="{{url('images/frontend/free ad wifi-01.png')}}" width="60px">
            </a>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer_copyright">
    Copyright © 2018 Free AD WiFi Inc.
</div>
<div class="col-xs-12 blankSpaceDiv visible-xs"></div>
