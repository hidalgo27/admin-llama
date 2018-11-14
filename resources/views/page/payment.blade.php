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
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="h1 font-weight-bold grey-text">Hidalgo Ch Ponce X2</div>
                                    <div class="font-weight-bold text-default">GTP500: Andes Escape</div>
                                    {{--<div class="font-weight-bold text-default">Travel date: 15 Jul 2018</div>--}}
                                </div>
                                <div class="col-6 text-right">
                                    <div class="h1 font-weight-bold grey-text"><sup>$</sup>500</div>
                                    <div class="font-weight-bold grey-text">15 Jul 2018</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            <i class="fas fa-credit-card prefix grey-text"></i>
                                            <input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method">
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            <i class="fas fa-qrcode prefix grey-text"></i>
                                            <input type="text" id="inputIconEx2" class="form-control" placeholder="Transaction">
                                            {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-center" value="27-05-2018">
                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-right" value="500">
                                        {{--<label for="inputPlaceholderEx">Amount to Pay</label>--}}
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <i class="fa fa-check font-weight-bold"></i>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            {{--<i class="fas fa-credit-card prefix grey-text"></i>--}}
                                            {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method">--}}
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            {{--<i class="fas fa-qrcode prefix grey-text"></i>--}}
                                            {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Transaction">--}}
                                            {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-center font-weight-bold text-secondary" value="27-05-2018">
                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-right" value="500">
                                        {{--<label for="inputPlaceholderEx">Amount to Pay</label>--}}
                                    </div>
                                </div>
                                <div class="col">
                                    <button class="btn btn-sm btn-amber btn-lg">register next payment</button>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            <i class="fas fa-credit-card prefix grey-text"></i>
                                            <input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method">
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            <i class="fas fa-qrcode prefix grey-text"></i>
                                            <input type="text" id="inputIconEx2" class="form-control" placeholder="Transaction">
                                            {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-center" value="27-05-2018">
                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-right" value="500">
                                        {{--<label for="inputPlaceholderEx">Amount to Pay</label>--}}
                                    </div>
                                </div>
                                <div class="col">
                                    <button class="btn btn-sm btn-primary btn-lg">Register Payment</button>
                                </div>
                            </div>
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
