<html>
<body>
<div>
    <p>親愛的會員您好：</p>
    <p>
        訂單編號 {{$order_number}} 付款成功<br>
        本次預購商品已為您安排出貨!<br>
        請留意訂單收貨地址，如有其他疑問歡迎您的來信。<br>
        詳情可至「會員專區」<a href="{{url('member_order')}}">訂單查詢</a> 查詢相關明細。 <br>
    </p>
    <p>
        ★此信件為系統自動傳送，請勿直接回覆。<br>
    </p>
</div>
@include('layouts.email.footer')

</body>
</html>
