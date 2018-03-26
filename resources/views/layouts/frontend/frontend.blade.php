<html>
    <head>
        <title>@yield('title')</title>
        <!--/tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--//tags -->
        <!--css -->
        <link href="{{asset('css/frontend/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/frontend/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/frontend/font-awesome.css')}}" rel="stylesheet"> 
        <link href="{{asset('css/frontend/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
        <!-- //for bootstrap working -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'> 
        @yield('css')
        <style>
            body{
                font-family: Microsoft JhengHei;
            }
            .breadcrumb{
                background-color: white;
                margin: 20px;
                padding: 0px;
            }
        </style>
        <!--//css -->
        <!--js -->
        @yield('js')
        <script type="text/javascript" src="{{asset('js/frontend/jquery-2.1.4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/frontend/bootstrap.js')}}"></script>
        <!--//js -->
    </head>
    <body>
        <!-- footer -->
        @include('layouts.frontend.header')
        <!-- //footer -->

        <!-- navbar -->
        @include('layouts.frontend.navbar')
        <!-- //navbar -->

        @yield('content')

        <!-- footer -->
        @include('layouts.frontend.footer')
        <!-- //footer -->

    </body>
</html>
