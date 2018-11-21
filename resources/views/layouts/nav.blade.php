<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="{{route('home_path')}}">
            <strong><span class="orange-text">LLAMA</span>tous</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link waves-effect" href="#">Sales--}}
                        {{--<span class="sr-only">(current)</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link waves-effect" href="{{asset('home_path}}"--}}
                       {{--target="_blank">About MDB</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link waves-effect" href="https://mdbootstrap.com/getting-started/" target="_blank">Free--}}
                        {{--download</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link waves-effect" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank">Free--}}
                        {{--tutorials</a>--}}
                {{--</li>--}}
            </ul>

            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link waves-effect" target="_blank">--}}
                        {{--<i class="fab fa-facebook"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link waves-effect" target="_blank">--}}
                        {{--<i class="fab fa-twitter"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link border border-light rounded waves-effect"--}}
                       {{--target="_blank">--}}
                        {{--<i class="fas fa-question-circle"></i> Help--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

        </div>

    </div>
</nav>
