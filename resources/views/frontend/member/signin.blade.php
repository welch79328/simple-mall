@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall 登錄')

@section('content')
<div class="new_arrivals_agile_w3ls_info" style="font-family: Microsoft JhengHei;"> 
    <div class="container">
        <form class="form-horizontal" action="{{url('member/login')}}" method="post">
            {{csrf_field()}}
            <div class="col-md-offset-2 col-md-8">
                <h2 style="margin-bottom: 20px">登錄</h2>

                <div class="form-group">
                    <input type="text" class="form-control" id="member_account" name="member_account" placeholder="請輸入信箱" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="member_password" name="member_password" placeholder="請輸入密碼" required>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8">
                @if(session('msg'))
                <p style="color: red; text-align: center;">{{session('msg')}}</p>
                @endif
                <div style="text-align: right">
                    <a class="agile-icon btn btn-default" href="{{url('signup')}}"></i>尚未擁有帳號，立即註冊</a>
                    <button type="submit" class="btn btn-primary">登錄</button>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- login modal-->
<!--<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
         Modal content
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
         //Modal content
    </div>
</div>-->
<!-- //login modal -->
@endsection