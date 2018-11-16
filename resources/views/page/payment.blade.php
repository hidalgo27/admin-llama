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

                            <div class="row align-items-center justify-content-between">
                                <div class="col-6">
                                    @foreach($inquire as $inquires)
                                    {{--<div class="h1 font-weight-bold grey-text">{{ucwords(strtolower($inquires->name))}}</div>--}}
                                        <div class="md-form m-0">
                                            <input type="text" id="p_name" class="form-control font-weight-bold grey-text font-size-35 p-0 display-1" placeholder="Client" value="{{ucwords(strtolower($inquires->name))}}">
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                    {{--<div class="font-weight-bold text-default">GTP500: Andes Escape</div>--}}
                                        <div class="md-form input-group-sm m-0 w-50">
                                            <input type="text" id="p_package" class="form-control font-weight-bold text-info p-0" placeholder="Payment Method" value="GTP500: Classic Cusco">
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                    {{--<div class="font-weight-bold text-default">Travel date: 15 Jul 2018</div>--}}
                                    @endforeach
                                </div>
                                <div class="col-2">
                                    {{--<div class="md-form m-0">--}}
                                        {{--<input type="text" id="p_name" class="form-control font-weight-bold grey-text font-size-35 p-0 text-right" placeholder="Client" value="500">--}}
                                        {{--<label for="inputIconEx2">Payment Method</label>--}}
                                    {{--</div>--}}
                                    <div class="md-form input-group-sm m-0">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input placeholder="Full Name" type="text" id="p_package" class="form-control font-weight-bold grey-text font-size-35 p-0 text-right" name="txt_name" value="500">
                                    </div>
                                    {{--<div class="h1 font-weight-bold grey-text"><sup>$</sup>500</div>--}}
                                    {{--<div class="font-weight-bold grey-text">15 Jul 2018</div>--}}
                                    <div class="md-form input-group-sm m-0">
                                        <input type="text" id="p_package" class="form-control font-weight-bold grey-text p-0 text-right" placeholder="Payment Method" value="15 Jul 2018">
                                        {{--<label for="inputIconEx2">Payment Method</label>--}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            <i class="fas fa-credit-card prefix grey-text"></i>
                                            <input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method" disabled>
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <div class="md-form">
                                            <i class="fas fa-qrcode prefix grey-text"></i>
                                            <input type="text" id="inputIconEx2" class="form-control" placeholder="Transaction" disabled>
                                            {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-center" value="27-05-2018" disabled>
                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form ">
                                        <input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-right" value="500" disabled>
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
                                        <input placeholder="Payment Day" type="text" id="inputPlaceholderEx" class="form-control text-center font-weight-bold text-secondary" value="27-05-2018">
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

        $( function() {
            $( ".datepicker" ).datepicker(
                {
                    dateFormat: 'yy-mm-dd'
                }
            );
        } );


    </script>
@endpush
