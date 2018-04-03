@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall 註冊')

@section('content')
    <div class="new_arrivals_agile_w3ls_info" style="font-family: Microsoft JhengHei;">
        <div class="container">
            <form class="form-horizontal" action="{{url('member_store')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-offset-2 col-md-8">
                    <h2 style="margin-bottom: 20px">註冊</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="member_mail"
                               placeholder="請輸入帳號 (電子信箱)" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="member_password"
                               placeholder="請輸入密碼(6至8位、開頭必須為英文字母)" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_check" name="member_password_check"
                               placeholder="密碼確認" required>
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    @if(count($errors)>0)
                        <div>
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p style="color: red; text-align: center;">{{$error}}</p>
                                @endforeach
                            @else
                                <p style="color: red; text-align: center;">{{$errors["msg"]}}</p>
                            @endif
                        </div>
                    @endif
                    <div style="text-align: right">
                        <button type="submit" class="btn btn-primary">註冊</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

<!-- signup modal -->
<!--<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
         Modal content
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
         //Modal content
    </div>
</div>-->
<!-- //Modal2 -->

