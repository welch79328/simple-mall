@extends('layouts.frontend')

@section('title', 'Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts')

@section('content')

<!-- header -->
<div class="header" id="home">
    <div class="container">
        <ul>
            <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
            <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            <form action="#" method="post">
                <input type="search" name="search" placeholder="Search here..." required="">
                <input type="submit" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 logo_agile">
            <h1><a href="{{url('frontend')}}"><span>E</span>lite Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li class="share">Share On : </li>
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



        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                            <li class=" menu__item"><a class="menu__link" href="{{url('about')}}">About</a></li>
                            <li class="dropdown menu__item">
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
                                                <li><a href="wo{{url('mens')}}">Clothing</a></li>
                                                <li><a href="wo{{url('mens')}}">Wallets</a></li>
                                                <li><a href="wo{{url('mens')}}">Footwear</a></li>
                                                <li><a href="wo{{url('mens')}}">Watches</a></li>
                                                <li><a href="wo{{url('mens')}}">Accessories</a></li>
                                                <li><a href="wo{{url('mens')}}">Bags</a></li>
                                                <li><a href="wo{{url('mens')}}">Caps & Hats</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="wo{{url('mens')}}">Jewellery</a></li>
                                                <li><a href="wo{{url('mens')}}">Sunglasses</a></li>
                                                <li><a href="wo{{url('mens')}}">Perfumes</a></li>
                                                <li><a href="wo{{url('mens')}}">Beauty</a></li>
                                                <li><a href="wo{{url('mens')}}">Shirts</a></li>
                                                <li><a href="wo{{url('mens')}}">Sunglasses</a></li>
                                                <li><a href="wo{{url('mens')}}">Swimwear</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                            <a href="wo{{url('mens')}}"><img src="images/top1.jpg" alt=" "/></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="menu__item dropdown">
                                <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Short Codes <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li><a href="{{url('icons')}}">Web Icons</a></li>
                                    <li><a href="{{url('typography')}}">Typography</a></li>
                                </ul>
                            </li>
                            <li class=" menu__item"><a class="menu__link" href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>	
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
                <form action="#" method="post" class="last"> 
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                </form>  

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
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
                    <p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="images/log_pic.jpg" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
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
                    <img src="images/log_pic.jpg" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->

<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        <li data-target="#myCarousel" data-slide-to="4" class=""></li> 
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active"> 
            <div class="container">
                <div class="carousel-caption">
                    <h3>The Biggest <span>Sale</span></h3>
                    <p>Special for today</p>
                    <a class="hvr-outline-out button2" href="{{url('mens')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item2"> 
            <div class="container">
                <div class="carousel-caption">
                    <h3>Summer <span>Collection</span></h3>
                    <p>New Arrivals On Sale</p>
                    <a class="hvr-outline-out button2" href="{{url('mens')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item3"> 
            <div class="container">
                <div class="carousel-caption">
                    <h3>The Biggest <span>Sale</span></h3>
                    <p>Special for today</p>
                    <a class="hvr-outline-out button2" href="{{url('mens')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item4"> 
            <div class="container">
                <div class="carousel-caption">
                    <h3>Summer <span>Collection</span></h3>
                    <p>New Arrivals On Sale</p>
                    <a class="hvr-outline-out button2" href="{{url('mens')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item5"> 
            <div class="container">
                <div class="carousel-caption">
                    <h3>The Biggest <span>Sale</span></h3>
                    <p>Special for today</p>
                    <a class="hvr-outline-out button2" href="{{url('mens')}}">Shop Now </a>
                </div>
            </div>
        </div> 
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div> 
<!-- //banner -->
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">
            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy">
                    <img src="images/bottom1.jpg" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>F</span>all Ahead</h3>
                        <p>New Arrivals</p>
                    </figcaption>			
                </figure>
            </div>
            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy">
                    <img src="images/bottom2.jpg" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>F</span>all Ahead</h3>
                        <p>New Arrivals</p>
                    </figcaption>			
                </figure>
            </div>
            <div class="clearfix"></div>
        </div> 
    </div> 
</div>
<!-- schedule-bottom -->
<div class="schedule-bottom">
    <div class="col-md-6 agileinfo_schedule_bottom_left">
        <img src="images/mid.jpg" alt=" " class="img-responsive" />
    </div>
    <div class="col-md-6 agileits_schedule_bottom_right">
        <div class="w3ls_schedule_bottom_right_grid">
            <h3>Save up to <span>50%</span> in this week</h3>
            <p>Suspendisse varius turpis efficitur erat laoreet dapibus. 
                Mauris sollicitudin scelerisque commodo.Nunc dapibus mauris sed metus finibus posuere.</p>
            <div class="col-md-4 w3l_schedule_bottom_right_grid1">
                <i class="fa fa-user-o" aria-hidden="true"></i>
                <h4>Customers</h4>
                <h5 class="counter">653</h5>
            </div>
            <div class="col-md-4 w3l_schedule_bottom_right_grid1">
                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                <h4>Events</h4>
                <h5 class="counter">823</h5>
            </div>
            <div class="col-md-4 w3l_schedule_bottom_right_grid1">
                <i class="fa fa-shield" aria-hidden="true"></i>
                <h4>Awards</h4>
                <h5 class="counter">45</h5>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- //schedule-bottom -->
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <h3 class="wthree_text_info">What's <span>Trending</span></h3>

        <div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
            <a href="wo{{url('mens')}}">
                <div class="bb-left-agileits-w3layouts-inner grid">
                    <figure class="effect-roxy">
                        <img src="images/bb1.jpg" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>S</span>ale </h3>
                            <p>Upto 55%</p>
                        </figcaption>			
                    </figure>
                </div>
            </a>
        </div>
        <div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
            <a href="{{url('mens')}}">
                <div class="bb-middle-agileits-w3layouts grid">
                    <figure class="effect-roxy">
                        <img src="images/bottom3.jpg" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>S</span>ale </h3>
                            <p>Upto 55%</p>
                        </figcaption>			
                    </figure>
                </div>
            </a>
            <a href="{{url('mens')}}">
                <div class="bb-middle-agileits-w3layouts forth grid">
                    <figure class="effect-roxy">
                        <img src="images/bottom4.jpg" alt=" " class="img-responsive">
                        <figcaption>
                            <h3><span>S</span>ale </h3>
                            <p>Upto 65%</p>
                        </figcaption>		
                    </figure>
                </div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--/grids-->
<div class="agile_last_double_sectionw3ls">
    <div class="col-md-6 multi-gd-img multi-gd-text ">
        <a href="wo{{url('mens')}}"><img src="images/bot_1.jpg" alt=" "><h4>Flat <span>50%</span> offer</h4></a>

    </div>
    <div class="col-md-6 multi-gd-img multi-gd-text ">
        <a href="wo{{url('mens')}}"><img src="images/bot_2.jpg" alt=" "><h4>Flat <span>50%</span> offer</h4></a>
    </div>
    <div class="clearfix"></div>
</div>							
<!--/grids-->
<!-- /new_arrivals --> 
<div class="new_arrivals_agile_w3ls_info"> 
    <div class="container">
        <h3 class="wthree_text_info">New <span>Arrivals</span></h3>		
        <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li> Men's</li>
                <li> Women's</li>
                <li> Bags</li>
                <li> Footwear</li>
            </ul>
            <div class="resp-tabs-container">
                <!--/tab_one-->
                <div class="tab1">
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m1.jpg" alt="" class="pro-image-front">
                                <img src="images/m1.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Formal Blue Shirt</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$45.99</span>
                                    <del>$69.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Formal Blue Shirt" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m2.jpg" alt="" class="pro-image-front">
                                <img src="images/m2.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Gabi Full Sleeve Sweatshirt</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$45.99</span>
                                    <del>$69.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Sweatshirt" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m3.jpg" alt="" class="pro-image-front">
                                <img src="images/m3.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Dark Blue Track Pants</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$80.99</span>
                                    <del>$89.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Dark Blue Track Pants" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m4.jpg" alt="" class="pro-image-front">
                                <img src="images/m4.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Round Neck Black T-Shirt</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$190.99</span>
                                    <del>$159.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Black T-Shirt" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m5.jpg" alt="" class="pro-image-front">
                                <img src="images/m5.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Men's Black Jeans</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$60.99</span>
                                    <del>$90.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Men's Black Jeans" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m7.jpg" alt="" class="pro-image-front">
                                <img src="images/m7.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Analog Watch</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$160.99</span>
                                    <del>$290.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Analog Watch" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m6.jpg" alt="" class="pro-image-front">
                                <img src="images/m6.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Reversible Belt</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$30.99</span>
                                    <del>$50.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Reversible Belt" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/m8.jpg" alt="" class="pro-image-front">
                                <img src="images/m8.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Party Men's Blazer</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$260.99</span>
                                    <del>$390.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Party Men's Blazer" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--//tab_one-->
                <!--/tab_two-->
                <div class="tab2">
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w1.jpg" alt="" class="pro-image-front">
                                <img src="images/w1.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">A-line Black Skirt</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$130.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="A-line Black Skirt" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w2.jpg" alt="" class="pro-image-front">
                                <img src="images/w2.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Sleeveless Solid Blue Top</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$140.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Sleeveless Solid Blue Top" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w3.jpg" alt="" class="pro-image-front">
                                <img src="images/w3.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Skinny Jeans</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$150.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Skinny Jeans " />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w4.jpg" alt="" class="pro-image-front">
                                <img src="images/w4.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Black Basic Shorts</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$120.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Black Basic Shorts" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w5.jpg" alt="" class="pro-image-front">
                                <img src="images/w5.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Pink Track Pants</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$220.99</span>
                                    <del>$389.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Pink Track Pants" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w6.jpg" alt="" class="pro-image-front">
                                <img src="images/w6.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Analog Watch</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$320.99</span>
                                    <del>$489.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Analog Watch" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w7.jpg" alt="" class="pro-image-front">
                                <img src="images/w7.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Ankle Length Socks</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$100.99</span>
                                    <del>$159.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Ankle Length Socks" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/w8.jpg" alt="" class="pro-image-front">
                                <img src="images/w8.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Reebok Women's Tights</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$130.99</span>
                                    <del>$169.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Reebok Women's Tights" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!--//tab_two-->
                <div class="tab3">

                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b1.jpg" alt="" class="pro-image-front">
                                <img src="images/b1.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Laptop Messenger Bag</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$140.99</span>
                                    <del>$169.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value=" Laptop Messenger Bag" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b2.jpg" alt="" class="pro-image-front">
                                <img src="images/b2.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Puma Backpack</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$127.99</span>
                                    <del>$169.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Puma Backpack" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b3.jpg" alt="" class="pro-image-front">
                                <img src="images/b3.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}"> Laptop Backpack</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$120.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value=" Laptop Backpack" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b4.jpg" alt="" class="pro-image-front">
                                <img src="images/b4.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Travel Duffel Bag </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$190.99</span>
                                    <del>$259.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Travel Duffel Bag " />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b5.jpg" alt="" class="pro-image-front">
                                <img src="images/b5.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}"> Hand-held Bag </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$190.99</span>
                                    <del>$259.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value=" Hand-held Bag " />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b6.jpg" alt="" class="pro-image-front">
                                <img src="images/b6.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Butterflies Bag </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$190.99</span>
                                    <del>$259.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Butterflies Bag" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b7.jpg" alt="" class="pro-image-front">
                                <img src="images/b7.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Costa Swiss Bag </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$290.99</span>
                                    <del>$359.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Costa Swiss Bag" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/b8.jpg" alt="" class="pro-image-front">
                                <img src="images/b8.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Noble Designs Bag </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$120.99</span>
                                    <del>$159.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Noble Designs Bag " />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tab4">

                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s1.jpg" alt="" class="pro-image-front">
                                <img src="images/s1.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Running Shoes</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$80.99</span>
                                    <del>$89.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Running Shoes" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s2.jpg" alt="" class="pro-image-front">
                                <img src="images/s2.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Shoetopia Lace Up</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$90.99</span>
                                    <del>$59.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Shoetopia Lace Up" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s3.jpg" alt="" class="pro-image-front">
                                <img src="images/s3.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Steemo Casuals(Black)</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$90.99</span>
                                    <del>$59.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Steemo Casuals (Black)" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s4.jpg" alt="" class="pro-image-front">
                                <img src="images/s4.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Benetton Flip Flops</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$40.99</span>
                                    <del>$99.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Benetton Flip Flops" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s5.jpg" alt="" class="pro-image-front">
                                <img src="images/s5.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Moonwalk Bellies </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$80.99</span>
                                    <del>$99.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Moonwalk Bellies" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s6.jpg" alt="" class="pro-image-front">
                                <img src="images/s6.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Aero Canvas Loafers  </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$120.99</span>
                                    <del>$199.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Aero Canvas Loafers" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s7.jpg" alt="" class="pro-image-front">
                                <img src="images/s7.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Sparx Sporty Canvas Shoes</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$160.99</span>
                                    <del>$199.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Sparx Sporty Canvas Shoes" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="images/s8.jpg" alt="" class="pro-image-front">
                                <img src="images/s8.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>

                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Women BLACK Heels</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$180.99</span>
                                    <del>$199.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Women BLACK Heels" />
                                            <input type="hidden" name="amount" value="30.99" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- //new_arrivals --> 
<!-- /we-offer -->
<div class="sale-w3ls">
    <div class="container">
        <h6>We Offer Flat <span>40%</span> Discount</h6>

        <a class="hvr-outline-out button2" href="{{url('single')}}">Shop Now </a>
    </div>
</div>
<!-- //we-offer -->
<!--/grids-->
<div class="coupons">
    <div class="coupons-grids text-center">
        <div class="w3layouts_mail_grid">
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>FREE SHIPPING</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-headphones" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>24/7 SUPPORT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>MONEY BACK GUARANTEE</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>FREE GIFT COUPONS</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!--grids-->

<!-- footer -->
@include('frontend.footer')
<!-- //footer -->

<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login">
                        <div class="login-bottom">
                            <h3>Sign up for free</h3>
                            <form>
                                <div class="sign-up">
                                    <h4>Email :</h4>
                                    <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'Type here';
                                            }" required="">	
                                </div>
                                <div class="sign-up">
                                    <h4>Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'Password';
                                            }" required="">

                                </div>
                                <div class="sign-up">
                                    <h4>Re-type Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'Password';
                                            }" required="">

                                </div>
                                <div class="sign-up">
                                    <input type="submit" value="REGISTER NOW" >
                                </div>

                            </form>
                        </div>
                        <div class="login-right">
                            <h3>Sign in with your account</h3>
                            <form>
                                <div class="sign-in">
                                    <h4>Email :</h4>
                                    <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'Type here';
                                            }" required="">	
                                </div>
                                <div class="sign-in">
                                    <h4>Password :</h4>
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                this.value = 'Password';
                                            }" required="">
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="single-bottom">
                                    <input type="checkbox"  id="brand" value="">
                                    <label for="brand"><span></span>Remember Me.</label>
                                </div>
                                <div class="sign-in">
                                    <input type="submit" value="SIGNIN" >
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<script src="{{asset('js/frontend/modernizr.custom.js')}}"></script>
<!-- Custom-JavaScript-File-Links --> 

<!-- script for responsive tabs -->						
<script src="{{asset('js/frontend/easy-responsive-tabs.js')}}"></script>
<script>
                                        $(document).ready(function () {
                                            $('#horizontalTab').easyResponsiveTabs({
                                                type: 'default', //Types: default, vertical, accordion           
                                                width: 'auto', //auto or any width like 600px
                                                fit: true, // 100% fit in a container
                                                closed: 'accordion', // Start closed if in accordion view
                                                activate: function (event) { // Callback function if tab is switched
                                                    var $tab = $(this);
                                                    var $info = $('#tabInfo');
                                                    var $name = $('span', $info);
                                                    $name.text($tab.text());
                                                    $info.show();
                                                }
                                            });
                                            $('#verticalTab').easyResponsiveTabs({
                                                type: 'vertical',
                                                width: 'auto',
                                                fit: true
                                            });
                                        });
</script>
<!-- //script for responsive tabs -->		

@endsection
