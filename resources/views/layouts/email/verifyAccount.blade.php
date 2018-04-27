<html>
<body>
<div>
    <p>親愛的會員您好：</p>
    <p>
        請點擊下面的連結即可完成驗證：<br>
        <a href="{{url('member_verify?account=' . $account . '&code=' . $code)}}">驗證信箱</a>
    </p>
    <p>
        ★此信件為系統自動傳送，請勿直接回覆。<br>
    </p>
</div>
@include('layouts.email.footer')

</body>
</html>
