<html>
<body>
<div>
    <p>姓名：{{$name}}</p>
    <p>電話：{{$phone}}</p>
    <p>信箱：{{$email}}</p>
    <p>主旨：{{$subject}}</p>
    <p>內容：</p>
    <p>
        {!! $comment !!}
    </p>
    <p>
        ★此信件為系統自動傳送，請勿直接回覆。<br>
    </p>
</div>
@include('layouts.email.footer')

</body>
</html>
