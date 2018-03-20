@extends('layouts.frontend.frontend')

@section('title', "Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template |Men's :: w3layouts")

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/frontend/jquery-ui.css')}}">
@endsection

@section('content')
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
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Women's <span>Wear  </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                    <li>Women's Wear</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- mens -->
        <div class="col-md-4 products-left">
            <div class="filter-price">
                <h3>Filter By <span>Price</span></h3>
                <ul class="dropdown-menu6">
                    <li>                
                        <div id="slider-range"></div>							
                        <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                    </li>			
                </ul>
            </div>
            <div class="css-treeview">
                <h4>Categories</h4>
                <ul class="tree-list-pad">
                    <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Men's Wear</label>
                        <ul>
                            <li><input type="checkbox" id="item-0-0" /><label for="item-0-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Ethnic Wear</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Caps</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                    <li><a href="mens.html">Trousers</a></li>
                                </ul>
                            </li>
                            <li><input type="checkbox"  id="item-0-1" /><label for="item-0-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Party Wear</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Caps</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                    <li><a href="mens.html">Trousers</a></li>
                                </ul>
                            </li>
                            <li><input type="checkbox"  id="item-0-2" /><label for="item-0-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Casual Wear</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Caps</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                    <li><a href="mens.html">Trousers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><input type="checkbox" id="item-1" checked="checked" /><label for="item-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Best Collections</label>
                        <ul>
                            <li><input type="checkbox" checked="checked" id="item-1-0" /><label for="item-1-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> New Arrivals</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Best Offers</label>
                        <ul>
                            <li><input type="checkbox"  id="item-2-0" /><label for="item-2-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Summer Discount Sales</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                </ul>
                            </li>
                            <li><input type="checkbox" id="item-2-1" /><label for="item-2-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Exciting Offers</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                </ul>
                            </li>
                            <li><input type="checkbox" id="item-2-2" /><label for="item-2-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Flat Discounts</label>
                                <ul>
                                    <li><a href="mens.html">Shirts</a></li>
                                    <li><a href="mens.html">Shoes</a></li>
                                    <li><a href="mens.html">Pants</a></li>
                                    <li><a href="mens.html">SunGlasses</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="community-poll">
                <h4>Community Poll</h4>
                <div class="swit form">	
                    <form>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>More convenient for shipping and delivery</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lower Price</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Track your item</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bigger Choice</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>More colors to choose</label> </div></div>	
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Secured Payment</label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Money back guaranteed</label> </div></div>	
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Others</label> </div></div>		
                        <input type="submit" value="SEND">
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-8 products-right">
            <h5>Product <span>Compare(0)</span></h5>
            <div class="sort-grid">
                <div class="sorting">
                    <h6>Sort By</h6>
                    <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">Default</option>
                        <option value="null">Name(A - Z)</option> 
                        <option value="null">Name(Z - A)</option>
                        <option value="null">Price(High - Low)</option>
                        <option value="null">Price(Low - High)</option>	
                        <option value="null">Model(A - Z)</option>
                        <option value="null">Model(Z - A)</option>					
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="sorting">
                    <h6>Showing</h6>
                    <select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">7</option>
                        <option value="null">14</option> 
                        <option value="null">28</option>					
                        <option value="null">35</option>								
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="men-wear-top">

                <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <li>
                            <img class="img-responsive" src="images/banner4.jpg" alt=" "/>
                        </li>
                        <li>
                            <img class="img-responsive" src="images/banner3.jpg" alt=" "/>
                        </li>
                        <li>
                            <img class="img-responsive" src="images/banner1.jpg" alt=" "/>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="men-wear-bottom">
                <div class="col-sm-4 men-wear-left">
                    <img class="img-responsive" src="images/bb1.jpg" alt=" " />
                </div>
                <div class="col-sm-8 men-wear-right">
                    <h4>Exclusive Women's <span>Collections</span></h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
                        ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                        odit aut fugit. </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 product-men">
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
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="business" value=" ">
                                    <input type="hidden" name="item_name" value="Black Basic Shorts">
                                    <input type="hidden" name="amount" value="30.99">
                                    <input type="hidden" name="discount_amount" value="1.00">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 product-men">
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
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="business" value=" ">
                                    <input type="hidden" name="item_name" value="Costa Swiss Bag">
                                    <input type="hidden" name="amount" value="30.99">
                                    <input type="hidden" name="discount_amount" value="1.00">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 product-men">
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
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="business" value=" ">
                                    <input type="hidden" name="item_name" value="Aero Canvas Loafers">
                                    <input type="hidden" name="amount" value="30.99">
                                    <input type="hidden" name="discount_amount" value="1.00">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

        <div class="single-pro">
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
    </div>
</div>	
<!-- //mens -->
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
<!-- js -->
<script type="text/javascript" src="{{asset('js/frontend/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<script src="{{asset('js/frontend/responsiveslides.min.js')}}"></script>
<script>
                                        // You can also use "$(window).load(function() {"
                                        $(function () {
                                            // Slideshow 4
                                            $("#slider3").responsiveSlides({
                                                auto: true,
                                                pager: true,
                                                nav: false,
                                                speed: 500,
                                                namespace: "callbacks",
                                                before: function () {
                                                    $('.events').append("<li>before event fired.</li>");
                                                },
                                                after: function () {
                                                    $('.events').append("<li>after event fired.</li>");
                                                }
                                            });
                                        });
</script>
<script src="{{asset('js/frontend/modernizr.custom.js')}}"></script>
<!-- Custom-JavaScript-File-Links --> 
<!-- cart-js -->
<script src="{{asset('js/frontend/minicart.min.js')}}"></script>
<script>
                                        // Mini Cart
                                        paypal.minicart.render({
                                            action: '#'
                                        });

                                        if (~window.location.search.indexOf('reset=true')) {
                                            paypal.minicart.reset();
                                        }
</script>

<!-- //cart-js --> 
<!---->
<script type='text/javascript'>//<![CDATA[ 
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 9000,
            values: [1000, 7000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
    });//]]>  

</script>
<script type="text/javascript" src="{{asset('js/frontend/jquery-ui.js')}}"></script>
<!---->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('js/frontend/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/frontend/jquery.easing.min.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('js/frontend/bootstrap.js')}}"></script>
@endsection
