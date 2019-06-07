<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <link href="{{asset('css/home/base.css')}}" rel="stylesheet">
    @yield('css')
    <!--[if lt IE 9]>
    <script src="{{asset('js/home/modernizr.js')}}"></script>
    <![endif]-->

</head>
<body>
<header>
    <div id="logo"><a href="{{url('/')}}"></a></div>
    <a href="{{url('shoppingcart/sho')}}"><button style="position: relative; left:800px; top: 30px;">購物車</button></a>
    <a href="{{url('home/login')}}"><button style="position: relative; left:800px; top: 30px;">登入</button></a>
    <div><a href="{{url('home/member/create')}}"><button style="position: relative; left:800px; top: 30px;">加入會員</button></a>
    <a href="{{url('')}}"><button style="position: relative; left:800px; top: 30px;">會員專區</button></a>
    {{--<nav class="topnav" id="topnav">--}}
        {{--@foreach($navs as $k=>$v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach--}}
    {{--</nav>--}}
</header>

@section('content')
    <h3>
        <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
        @foreach($new as $n)
            <li><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
        @endforeach
    </ul>
    <h3 class="ph">
        <p>點擊<span>排行</span></p>
    </h3>
    <ul class="paih">
        @foreach($hot as $h)
            <li><a href="{{url('a/'.$h->art_id)}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
        @endforeach
    </ul>
@show

<footer>
    {{--<p>{!! Config::get('web.copyright') !!} {!! Config::get('web.web_count') !!}</p>--}}
</footer>
</body>
</html>
