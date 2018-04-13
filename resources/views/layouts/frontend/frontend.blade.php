<html>
<head>
    <title>@yield('title')</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//tags -->
    <!--css -->
    <link href="{{asset('css/frontend/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/frontend/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/frontend/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400300i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,,300italic,400italic,700,900,900italic,700italic'
          rel='stylesheet' type='text/css'>
    @yield('css')
    <style>
        body {
            font-family: Microsoft JhengHei;
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
@if(count($errors) > 0)
    @include("layouts.frontend.modal", ['id' => "errorsModal", 'title' => "提示", 'onclick' => ""])
    <script>
        $(document).ready(function () {
            $("#errorsModal").modal("show");
        });
    </script>
@endif
@if(session('sussess.msg'))
    <script>
        $(document).ready(function () {
            showModal("sussessModal", "提示", "{{session('sussess.msg')}}");
        });
    </script>
@endif
<!-- header -->
@include('layouts.frontend.header')
<!-- //header -->

<!-- navbar -->
@include('layouts.frontend.navbar')
<!-- //navbar -->

@yield('content')

<!-- footer -->
@include('layouts.frontend.footer')
<!-- //footer -->

<!-- modal -->
<div id="modalPlacement"></div>
<!-- //modal -->

<script>
    function showModal(modalId, title, content, callback = null) {
        var html = '<div class="modal fade" tabindex="-1" role="dialog" id="' + modalId
            + '" aria-hidden="true" style="display: none;">';
        html += '<div class="modal-dialog" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        html += '<h4 class="modal-title">' + title + '</h4>';
        html += '</div>';
        html += '<div class="modal-body">';
        html += '<p>' + content + '</p>';
        html += '</div>';
        html += '<div class="modal-footer">';
        html += '<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>';
        html += '</div>';
        html += '</div>';//.modal-content
        html += '</div>';//.modal-dialog
        html += '</div>';//.modal
        $("#modalPlacement").html(html);
        if (callback != null) {
            $("#" + modalId).on("hide.bs.modal", callback);
        }
        $("#" + modalId).modal("show");
    }
</script>
</body>
</html>
