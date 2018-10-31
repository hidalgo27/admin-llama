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
                                        <a href="{{route('statistics_path')}}" class="btn btn-link">Basic Information</a> | <a href="{{route('chart_path')}}" class="btn btn-link active">comparison chart</a>
                                    </div>
                                </div>
                                <!-- Section description -->
                                {{--<p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
                                {{--Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam--}}
                                {{--eum porro a pariatur veniam.</p>--}}

                                <div class="row mb-5 bg-light rounded justify-content-center ">
                                    <div class="col-6">
                                        <form class="form-inline">
                                            <div class="input-group">
                                                <label for="inputPassword6" class="mr-2">From</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                                <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                            </div>
                                            <div class="input-group mx-4">
                                                <label for="inputPassword6" class="mr-2">To</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                                <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Grid row -->
                                <div class="row justify-content-center">

                                   <div class="col">
                                       <canvas id="myChart" style="max-width: 100%;"></canvas>
                                   </div>
                                    <div class="col">
                                        <canvas id="lineChart"></canvas>
                                    </div>

                                </div>
                                <!-- Grid row -->

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

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Paola", "Martin", "Karina"],
                datasets: [{
                    label: '# of Sales',
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

        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "Martin",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                },
                    {
                        label: "Paola",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: [
                            'rgba(0, 137, 132, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 10, 130, .7)',
                        ],
                        borderWidth: 2
                    }
                    ,
                    {
                        label: "Karina",
                        data: [2, 8, 0, 9, 6, 7, 70],
                        backgroundColor: [
                            'rgba(100, 137, 132, .5)',
                        ],
                        borderColor: [
                            'rgba(100, 10, 130, .7)',
                        ],
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endpush