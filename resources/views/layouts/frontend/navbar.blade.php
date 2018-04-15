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
                        <li class="menu__item">
                            <a class="menu__link" href="{{url('limit_commodities_page')}}">限時商品</a>
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
                        <li class="menu__item"><a class="menu__link" href="{{url('question')}}">購物流程FAQ</a></li>
                        <li class="menu__item"><a class="menu__link" href="{{url('contact')}}">聯絡資訊</a></li>
                        <li class="menu__item visible-xs"><a class="menu__link">追蹤我們</a></li>
                        <li class="menu__item visible-xs">
                            <a href="https://www.facebook.com/JUGOmall/">
                                <img src="{{url('images/frontend/facebook.png')}}" width="30px">
                            </a>
                            <a href="https://line.me/R/ti/p/%40tbk0394m">
                                <img src="{{url('images/frontend/line.png')}}" width="35px">
                            </a>
                        </li>
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
