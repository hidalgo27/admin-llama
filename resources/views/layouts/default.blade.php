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
                            <div class="user-head">
                                <a class="inbox-avatar" href="javascript:;">
                                    <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                                </a>
                                <div class="user-name">
                                    <h5><a href="#">Alireza Zare</a></h5>
                                    <span><a href="#">Info.Ali.Pci@Gmail.com</a></span>
                                </div>
                                <a class="mail-dropdown float-right" href="javascript:;">
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </div>
                            <div class="inbox-body">
                                <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                                    Compose
                                </a>
                                <!-- Modal -->
                                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title">Compose</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">To</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Cc / Bcc</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" placeholder="" id="cc" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Subject</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" placeholder="" id="inputPassword1" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Message</label>
                                                        <div class="col-lg-10">
                                                            <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>
                                                            <button class="btn btn-send" type="submit">Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                            <ul class="inbox-nav inbox-divider">
                                <li class="active">
                                    <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-danger float-right">2</span></a>

                                </li>
                                <li>
                                    <a href="#"><i class="far fa-envelope"></i> Sent Mail</a>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-bookmark"></i> Important</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-external-link-alt"></i> Drafts <span class="badge badge-info float-right">30</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class=" fa fa-trash-alt"></i> Trash</a>
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

                            <div class="inbox-body text-center">
                                <div class="btn-group">
                                    <a class="btn mini btn-primary" href="javascript:;">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn mini btn-success" href="javascript:;">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn mini btn-info" href="javascript:;">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                </div>
                            </div>

                        </aside>
                        <aside class="lg-side">
                            <div class="inbox-head orange">
                                <h3>Inbox</h3>
                                <form action="#" class="float-right position">
                                    <div class="input-append">
                                        <input type="text" class="sr-input" placeholder="Search Mail">
                                        <button class="btn sr-btn m-0" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
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
</script>
@stack('scripts')


</body>

</html>