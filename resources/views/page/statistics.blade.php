@extends('layouts.default-sidebar')
{{--@section('nav')--}}
{{--@parent--}}
{{--@include('layouts.nav')--}}
{{--@endsection--}}
{{--@section('sidebar')--}}
{{--@parent--}}
{{--@include('layouts.sidebar')--}}
{{--@endsection--}}
@section('content')
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- Section: Team v.1 -->
                            <section class="team-section text-center my-5">

                                <!-- Section heading -->
                                <h2 class="h1-responsive font-weight-bold mt-5">Sellers Statistics</h2>
                                <div class="row my-4">
                                    <div class="col">
                                        @php
                                            date_default_timezone_set('America/Lima');
                                            $date_a = date ("Y-m-d");
                                        @endphp
                                        <a href="{{route('statistics_path', [$date_a, $date_a])}}" class="btn btn-link active">Basica Information</a> | <a href="{{route('chart_path')}}" class="btn btn-link">comparison chart</a>
                                    </div>
                                </div>
                                <!-- Section description -->
                                {{--<p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
                                    {{--Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam--}}
                                    {{--eum porro a pariatur veniam.</p>--}}

                                <div class="row mb-5 bg-light rounded justify-content-center ">
                                    <div class="col-10">
                                        <form class="form-inline">

                                            <div class="input-group">
                                                <label for="inputPassword6" class="mr-2">From</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                                <input type="text" id="i_from" name="from" class="form-control datepicker" aria-describedby="passwordHelpInline" value="{{$fromDate}}">
                                            </div>
                                            <div class="input-group mx-4">
                                                <label for="inputPassword6" class="mr-2">To</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                                <input type="text" id="i_to" name="to" class="form-control datepicker" aria-describedby="passwordHelpInline" value="{{$toDate}}">
                                            </div>
                                            {{--<a href="" class="btn btn-primary mb-2">Submit</a>--}}
                                            <button type="button" class="btn btn-primary mb-2" onclick="range()">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Grid row -->
                                <div class="row justify-content-center">
                                    @foreach($user->where('estado', 1) as $users)
                                        @php $k = 0; $j = 0; $i = 0; $h = 0; @endphp
                                        @foreach($users->roles->where('name', 'sales') as $rol)
                                                @foreach($inquire->where('estado', '<', 3) as $inquires)
                                                    @php $i++; @endphp
                                                @endforeach
                                                @foreach($inquire->where('idusuario', $users->id)->where('estado', '<', 3)->where('estado', 2) as $inquires)
                                                    @php $j++; @endphp
                                                @endforeach
                                                    @foreach($inquire->where('idusuario', $users->id)->where('estado', '<', 3) as $inquires)
                                                        @php $k++; @endphp
                                                    @endforeach

                                                    @foreach($inquire->where('idusuario', $users->id)->where('estado', 4) as $inquires)
                                                        @php $h++; @endphp
                                                    @endforeach
                                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                                                <a href="{{route('info_path', $users->id)}}">
                                                    <div class="avatar mx-auto">
                                                        <img src="{{asset('images/'.$users->email.'.jpg')}}" class="rounded-circle z-depth-1 w-100"
                                                             alt="Sample avatar">
                                                    </div>
                                                    <h5 class="font-weight-bold mt-4 mb-3">{{$users->name}}</h5>
                                                    <p class="text-uppercase blue-text"><strong>{{$rol->name}}</strong></p>
                                                    <p class="grey-text w-responsive mx-auto">Closing Rate: <span class="font-weight-bold text-dark">{{$h}}</span></p>
                                                    <a href="s" class="btn btn-link mx-auto mb-5 font-weight-bold"><span class="grey-text">Inquires:</span> <span class="font-weight-bold text-dark">{{$k}}</span> <span class="grey-text">Response:</span> <span class="font-weight-bold text-dark">{{$j}}</span></a>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <!-- Grid row -->
                                <div class="row">
                                    <div class="col">
                                        <div class="alert alert-dark font-weight-bold">Total Inquires: {{$i}}</div>
                                    </div>
                                </div>

                            </section>
                            <!-- Section: Team v.1 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        function range(){
            var $from = $('#i_from').val();
            var $to = $('#i_to').val();
            window.location.href = '../../statistics/'+$from+'/'+$to;

        }

        $( function() {
            $( ".datepicker" ).datepicker(
                {
                    dateFormat: 'yy-mm-dd'
                }
            );
        } );

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Paola", "Martin", "Karina"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
