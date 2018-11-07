<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect" href="{{route('home_path')}}">
        <img src="{{asset('images/logo-llama2.png')}}" class="w-100" alt="">
    </a>
    @if(Auth::user()->hasRole('admin'))
        <div class="list-group list-group-flush">
            <a href="{{route('home_path')}}" class="list-group-item active waves-effect">
                <i class="fa fa-inbox mr-3"></i>Inquires
            </a>
            <a href="{{route('packages_path')}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-flag mr-3"></i>Packages</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-table mr-3"></i>Category</a>
            @php
                date_default_timezone_set('America/Lima');
                $date_a = date ("Y-m-d");
            @endphp
            <a href="{{route('statistics_path', [$date_a, $date_a])}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-chart-bar mr-3"></i></i>Sellers Statistics</a>
            {{--<a href="#" class="list-group-item list-group-item-action waves-effect">--}}
            {{--<i class="fa fa-map mr-3"></i>Maps</a>--}}
            {{--<a href="#" class="list-group-item list-group-item-action waves-effect">--}}
            {{--<i class="fa fa-money mr-3"></i>Orders</a>--}}
        </div>
    @else
        <div class="list-group list-group-flush">
            <a href="{{route('home_path')}}" class="list-group-item active waves-effect">
                <i class="fa fa-inbox mr-3"></i>Inquires
            </a>
        </div>
    @endif

</div>
<!-- Sidebar -->