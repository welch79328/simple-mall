<!-- header -->
<div class="header" id="home">
    <div class="col-md-4"></div>
    <div class="col-md-5">
        <ul>
<!--            <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> 登入 </a></li>
            <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 註冊 </a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> 電話 : 01234567898</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>-->
            <li>
                <button class="btn btn-default" type="button" style="border: none;" onclick="{
                            $('#loginModal').modal('show');
                        }">
                    <i class="glyphicon glyphicon-log-in"></i>登入
                </button>
            </li>
            <li style="display: none;">
                <button class="btn btn-default" type="button" style="border: none;" onclick="">
                    <i class="glyphicon glyphicon-log-out"></i>登出
                </button>
            </li>
            <li>
                <button class="btn btn-default" type="button" style="border: none;" onclick="{
                            $('#signupModal').modal('show');
                        }">
                    <i class="glyphicon glyphicon-pencil"></i>註冊
                </button>
            </li>
            <li>
                <a class="agile-icon btn btn-default" style="border: none;" href="#">會員專區</a>
            </li>
            <li>
                <!--                <form action="#" method="post" class="last"> 
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="display" value="1">
                                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-shopping-cart" aria-hidden="true"></i>購物車</button>
                                </form>-->
                <!--                                <a href="{{url('shoppingcart/show')}}">-->
                <a class="agile-icon btn btn-default" style="border: none;" href="{{url('shoppingcart/show')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true">({{$cartCount}})</i>購物車
                </a>
                <!--                                </a>-->
            </li>
            <li>

            </li>
        </ul>
    </div>
    <div class="col-md-3" style="padding-top: 3.5px;">
        <div class="input-group">
            <input type="text" class="form-control" aria-label="..." placeholder="商品關鍵字搜尋">
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

<!-- login modal-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required=""> 
                            <label>Email</label>
                            <span></span>
                        </div> 
                        <input type="submit" value="Sign In">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
                    <div class="clearfix"></div>
                    <p><a href="#" data-toggle="modal" data-target="#signupModal" > Don't have an account?</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{url('images/log_pic.jpg')}}" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //login modal -->

<!-- signup modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    <form action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required=""> 
                            <label>Email</label>
                            <span></span>
                        </div> 
                        <div class="styled-input">
                            <input type="password" name="password" required=""> 
                            <label>Password</label>
                            <span></span>
                        </div> 
                        <div class="styled-input">
                            <input type="password" name="Confirm Password" required=""> 
                            <label>Confirm Password</label>
                            <span></span>
                        </div> 
                        <input type="submit" value="Sign Up">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
                    <div class="clearfix"></div>
                    <p><a href="#">By clicking register, I agree to your terms</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="{{url('images/log_pic.jpg')}}" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->
