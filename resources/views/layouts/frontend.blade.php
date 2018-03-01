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
        <link href="{{asset('css/frontend/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/frontend/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/frontend/font-awesome.css')}}" rel="stylesheet"> 
        <link href="{{asset('css/frontend/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
        <!-- //for bootstrap working -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'> 
    </head>
    <body>
        <!-- js -->
        <script type="text/javascript" src="{{asset('js/frontend/jquery-2.1.4.min.js')}}"></script>
        <!-- //js -->

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

        <!-- stats -->
        <script src="{{asset('js/frontend/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/frontend/jquery.countup.js')}}"></script>
        <script> $('.counter').countUp();</script>
        <!-- //stats -->

        <!-- for bootstrap working -->
        <script type="text/javascript" src="{{asset('js/frontend/bootstrap.js')}}"></script>
        
        @yield('content')
</body>
</html>
