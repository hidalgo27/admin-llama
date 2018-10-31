<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
<!-- Bootstrap core CSS -->
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{mix("css/app.css")}}">
</head>

<body class="grey lighten-3">

<!--Main Navigation-->
<header>
    <!-- Navbar -->
@section('nav')
    @parent
    @include('layouts.nav')
@show

<!-- Sidebar-->
    @section('sidebar')
        @parent
        @include('layouts.sidebar')
    @show

</header>
<!--Main Navigation-->

<!--Main layout-->
@yield('content')

<!--Footer-->
<footer class="page-footer text-center font-small bg-dark darken-2 mt-4 wow fadeIn">

    {{--<!--Call to action-->--}}
    {{--<div class="pt-4">--}}
    {{--<a class="btn btn-outline-white" href="https://mdbootstrap.com/getting-started/" target="_blank" role="button">Download--}}
    {{--MDB--}}
    {{--<i class="fa fa-download ml-2"></i>--}}
    {{--</a>--}}
    {{--<a class="btn btn-outline-white" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank" role="button">Start--}}
    {{--free tutorial--}}
    {{--<i class="fa fa-graduation-cap ml-2"></i>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<!--/.Call to action-->--}}

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
        <a href="#" target="_blank">
            <i class="fab fa-facebook mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-twitter mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-youtube mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-google-plus mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-dribbble mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-pinterest mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-github mr-3"></i>
        </a>

        <a href="#" target="_blank">
            <i class="fab fa-codepen mr-3"></i>
        </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2018 Copyright:
        <a href="#" target="_blank"> pandaninja.com.pe </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->


<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("js/plugins.js")}}"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>
@stack('scripts')


</body>

</html>