<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Llama Tours</title>
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
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <!-- Heading -->
    {{--<div class="card mb-4 wow fadeIn">--}}

    {{--<!--Card content-->--}}
    {{--<div class="card-body d-sm-flex justify-content-between">--}}

    {{--<h4 class="mb-2 mb-sm-0 pt-1">--}}
    {{--<a href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Home Page</a>--}}
    {{--<span>/</span>--}}
    {{--<span>Dashboard</span>--}}
    {{--</h4>--}}

    {{--<form class="d-flex justify-content-center">--}}
    {{--<!-- Default input -->--}}
    {{--<input type="search" placeholder="Type your query" aria-label="Search" class="form-control">--}}
    {{--<button class="btn btn-primary btn-sm my-0 p" type="submit">--}}
    {{--<i class="fa fa-search"></i>--}}
    {{--</button>--}}

    {{--</form>--}}

    {{--</div>--}}

    {{--</div>--}}
    <!-- Heading -->

        <div class="row wow fadeIn">
            <div class="col">
                <div class="card">
                    {{--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>--}}
                    <div class="mail-box">
                        <aside class="sm-side">
                            {{--<div class="user-head">--}}
                                {{--<a class="inbox-avatar" href="javascript:;">--}}
                                    {{--<img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">--}}
                                {{--</a>--}}
                                {{--<div class="user-name">--}}
                                    {{--<h5><a href="#">Alireza Zare</a></h5>--}}
                                    {{--<span><a href="#">Info.Ali.Pci@Gmail.com</a></span>--}}
                                {{--</div>--}}
                                {{--<a class="mail-dropdown float-right" href="javascript:;">--}}
                                    {{--<i class="fa fa-chevron-down"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            <div class="inbox-body">
                                <a href="#" data-toggle="modal"  title="Compose"  data-target="#compose"  class="btn btn-compose">
                                    Compose
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 grey-text font-weight-bold">NEW INQUIRE</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('save_compose_path')}}" role="form" method="post">
                                                {{csrf_field()}}
                                                <div class="modal-body mx-3">
                                                    <div class="row my-3 align-items-center">
                                                        <div class="col">
                                                            <select class="selectpicker w-100" data-live-search="true" id="a_package" name="id_package">
                                                                @foreach($package as $pack)
                                                                    <option data-tokens="ketchup mustard" value="{{$pack->id}}">{{$pack->codigo}}: {{$pack->titulo}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row pt-4">
                                                        <div class="col">
                                                            <div class="md-form mb-5">
                                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                                <input placeholder="Full Name" type="text" id="a_name" class="form-control validate" name="txt_name" required>
                                                                <label data-error="wrong" data-success="right" for="a_name">Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="md-form mb-5">
                                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                                <input placeholder="Email" type="email" id="a_mail" class="form-control validate" name="txt_email" required>
                                                                <label data-error="wrong" data-success="right" for="a_mail">Your email</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="md-form mb-5">
                                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                                <input placeholder="Traveller Number" type="number" id="a_travellers" class="form-control validate" name="txt_travellers" required>
                                                                <label data-error="wrong" data-success="right" for="a_travellers">Travellers</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="md-form mb-5">
                                                                <i class="fa fa-envelope prefix grey-text"></i>
                                                                <input placeholder="Travel Date" type="text" id="datepicker" class="form-control validate" name="txt_date" required>
                                                                <label data-error="wrong" data-success="right" for="a_date">Travel Date</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <i class="fas fa-spinner fa-pulse fa-2x text-primary d-none" id="sp_load"></i>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-primary" type="submit">Compose</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--<p>Date: <input type="text" id="datepicker"></p>--}}


                            </div>
                            <ul class="inbox-nav inbox-divider">
                                <li class="active">
                                    <a href="{{route('home_path')}}"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-danger float-right">2</span></a>

                                </li>
                                {{--<li>--}}
                                    {{--<a href="{{route('send_methods_path')}}"><i class="far fa-share-square"></i> Payment Methods</a>--}}
                                {{--</li>--}}
                                <li>
                                    <a href="{{route('send_path')}}"><i class="fas fa-credit-card"></i> Payment Process</a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="#"><i class="far fa-bookmark"></i> Important</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#"><i class="fas fa-external-link-alt"></i> Drafts <span class="badge badge-info float-right">30</span></a>--}}
                                </li>
                                <li>
                                    <a href="{{route('trash_path')}}"><i class=" fa fa-trash-alt"></i> Trash</a>
                                </li>
                            </ul>
                            {{--<ul class="nav nav-pills nav-stacked labels-info inbox-divider ">--}}
                            {{--<li> <h4>Labels</h4> </li>--}}
                            {{--<li> <a href="#"> <i class=" fa fa-sign-blank text-danger"></i> Work </a> </li>--}}
                            {{--<li> <a href="#"> <i class=" fa fa-sign-blank text-success"></i> Design </a> </li>--}}
                            {{--<li> <a href="#"> <i class=" fa fa-sign-blank text-info "></i> Family </a>--}}
                            {{--</li><li> <a href="#"> <i class=" fa fa-sign-blank text-warning "></i> Friends </a>--}}
                            {{--</li><li> <a href="#"> <i class=" fa fa-sign-blank text-primary "></i> Office </a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--<ul class="nav nav-pills nav-stacked labels-info ">--}}
                            {{--<li> <h4>Buddy online</h4> </li>--}}
                            {{--<li> <a href="#"> <i class=" fa fa-circle text-success"></i>Alireza Zare <p>I do not think</p></a>  </li>--}}
                            {{--<li> <a href="#"> <i class=" fa fa-circle text-danger"></i>Dark Coders<p>Busy with coding</p></a> </li>--}}
                            {{--<li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Mentaalist <p>I out of control</p></a>--}}
                            {{--</li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>H3s4m<p>I am not here</p></a>--}}
                            {{--</li><li> <a href="#"> <i class=" fa fa-circle text-muted "></i>Dead man<p>I do not think</p></a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}

                            {{--<div class="inbox-body text-center">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a class="btn mini btn-primary" href="javascript:;">--}}
                                        {{--<i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a class="btn mini btn-success" href="javascript:;">--}}
                                        {{--<i class="fa fa-phone"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a class="btn mini btn-info" href="javascript:;">--}}
                                        {{--<i class="fa fa-cog"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </aside>
                        <aside class="lg-side">
                            {{--<div class="inbox-head orange">--}}
                                {{--<h3>Inbox</h3>--}}
                                {{--<form action="#" class="float-right position">--}}
                                    {{--<div class="input-append">--}}
                                        {{--<input type="text" class="sr-input" placeholder="Search Mail">--}}
                                        {{--<button class="btn sr-btn m-0" type="button"><i class="fa fa-search"></i></button>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                            <div class="inbox-body pt-2">
                                @yield('content')
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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

    $( function() {
        $( "#a_date" ).datepicker();
    } );
</script>
@stack('scripts')

<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
        });
    } );
</script>
</body>

</html>
