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
    @foreach($inquire as $inquires)

    @endforeach
    @if ($inquires->price == 0 OR $inquires->price == NULL)
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success text-center">
                                <h5>Felicitaciones <strong>{{ Auth::user()->name }}</strong> usted esta a punto de registrar una venta para <strong>{{$inquires->name}}</strong> (<span class="small">{{$inquires->email}}</span>).</h5>
                            </div>
                            {{--<p>Ingrese el monto total de su venta:</p>--}}
                            <form action="{{route('save_total_inquire_path')}}" method="post">
                                {{csrf_field()}}
                                <div class="row justify-content-center">
                                    <div class="col-6 bg-white shadow-sm">
                                        <div class="md-form my-5">
                                            <i class="fas fa-dollar-sign prefix grey-text"></i>
                                            <input placeholder="Price Sales" type="number" class="form-control validate" name="txt_price" required>
                                            <input type="hidden" name="txt_idinquire" value="{{$inquires->id}}">
                                            <label data-error="wrong" data-success="right" for="a_name">Enter the total amount of sale:</label>
                                        </div>
                                        <div class="md-form text-center">
                                            <button type="submit" class="btn btn-lg btn-info">Register Sales</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @else
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Su venta se registro satisfactoriamente.</strong>
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col text-right">
                                    <button class="btn btn-grey" data-toggle="modal" data-target="#preview">Preview</button>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        {{--<div class="modal-header">--}}
                                            {{--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                                {{--<span aria-hidden="true">&times;</span>--}}
                                            {{--</button>--}}
                                        {{--</div>--}}
                                        <div class="modal-body">
                                            <div id="invoice">
                                                <div class="invoice overflow-auto">
                                                    <div>
                                                        <header>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a target="_blank" href="http://llama.tours/">
                                                                        <img src="{{asset('images/logo-llama.png')}}" data-holder-rendered="true" width="300">
                                                                    </a>
                                                                </div>
                                                                <div class="col company-details">
                                                                    <h2 class="name">
                                                                        <a target="_blank" href="#">
                                                                            LlamaTours
                                                                        </a>
                                                                    </h2>
                                                                    <div> Av. Sol 948, dep. 315, Cusco - Cusco</div>
                                                                    <div>+51 (084) 206931</div>
                                                                    <div>info@llama.tours</div>
                                                                </div>
                                                            </div>
                                                        </header>
                                                        <main class="p-0">
                                                            <div class="row contacts">
                                                                <div class="col invoice-to">
                                                                    <div class="text-gray-light">INVOICE TO:</div>
                                                                    @foreach($inquire as $inquires)
                                                                        <h2 class="to">{{$inquires->name}}</h2>
                                                                    @endforeach
                                                                    {{--<div class="address">796 Silver Harbour, TX 79273, US</div>--}}
                                                                    <div class="email"><a href="mailto:{{$inquires->email}}">{{$inquires->email}}</a></div>
                                                                </div>
                                                                <div class="col invoice-details">
                                                                    <h1 class="invoice-id">INVOICE 000{{$inquires->id}}</h1>
                                                                    @php
                                                                        date_default_timezone_set('America/Lima');
                                                                        $date_d = strftime("%d %b %Y",strtotime(date("Y-m-d")));
                                                                        $date_a = date("Y-m-d");
                                                                    @endphp
                                                                    <div class="date">Date of Invoice: {{$date_d}}</div>
                                                                    {{--<div class="date">Due Date: 30/10/2018</div>--}}
                                                                </div>
                                                            </div>
                                                            <table border="0" cellspacing="0" cellpadding="0" class="w-100">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th class="text-left">DESCRIPTION</th>
                                                                    <th class="text-left">PAYMENT DATE</th>
                                                                    <th class="text-right">TOTAL</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @php $total = 0; @endphp
                                                                @foreach($payment as $payments)
                                                                    @foreach($package->where('id', $payments->inquires->id_paquetes) as $packages)
                                                                    <tr>
                                                                        <td class="no">01</td>
                                                                        <td class="text-left">
                                                                            <h3>{{$packages->titulo}} X {{$payments->inquires->traveller}}</h3>
                                                                            {{--Creating a recognizable design solution based on the company's existing visual identity--}}
                                                                        </td>
                                                                        <td>{{$payments->created_at}}</td>
                                                                        <td class="total">${{$payments->a_cuenta}}</td>
                                                                    </tr>
                                                                        @php
                                                                            $total = $total + $payments->a_cuenta
                                                                        @endphp
                                                                    @endforeach
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td>SUBTOTAL</td>
                                                                    <td>${{$total}}</td>
                                                                </tr>
                                                                {{--<tr>--}}
                                                                    {{--<td colspan="1"></td>--}}
                                                                    {{--<td colspan="3">PENDING</td>--}}
                                                                    {{--<td>$100.00</td>--}}
                                                                {{--</tr>--}}
                                                                <tr>
                                                                    <td colspan="2" class="text-left display-1 font-weight-bold">Thank you!</td>
                                                                    <td>GRAND TOTAL</td>
                                                                    <td>${{$total}}</td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                            {{--<div class="thanks">Thank you!</div>--}}

                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        @if (isset($payments))
                                                                            <p class="m-0"><b class="font-weight-bold">Price per person:</b> {{$total}}/{{$payments->inquires->traveller}} = ${{round($total/$payments->inquires->traveller, 2)}}</p>
                                                                        @endif
                                                                        <p class="m-0"><strong class="text-danger font-weight-bold">Outstanding: $100.00</strong></p>
                                                                        <p class="m-0 font-weight-bold"><span class="yellow p-1 rounded">Next Payment Date: 28 Jul 2018</span></p>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                            <table>
                                                                <caption>Means of payment</caption>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>VISA</td>
                                                                        <td class="text-center">12554648874</td>
                                                                        <td class="text-right">27 jul 2018</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="notices">
                                                                <div>NOTICE:</div>
                                                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                                            </div>
                                                        </main>
                                                        <footer>
                                                            Invoice was created on a computer and is valid without the signature and seal.
                                                        </footer>
                                                    </div>
                                                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="modal-footer">--}}
                                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>


                            <div class="row justify-content-between">
                                <div class="col-6">
                                    @foreach($inquire as $inquires)
                                    {{--<div class="h1 font-weight-bold grey-text">{{ucwords(strtolower($inquires->name))}}</div>--}}
                                        <div class="md-form m-0">
                                            <input type="text" id="p_name" class="form-control font-weight-bold grey-text font-size-35 p-0 display-1" placeholder="Client" value="{{ucwords(strtolower($inquires->name))}}">
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-form m-0">
                                                    <input type="text" id="p_email" class="form-control font-weight-bold grey-text p-0" placeholder="Client" value="{{strtolower($inquires->email)}}">
                                                    {{--<label for="inputIconEx2">Payment Method</label>--}}
                                                </div>
                                            </div>
                                            <div class="col-1">X</div>
                                            <div class="col-2">
                                                <div class="md-form m-0">
                                                    <input type="text" id="p_traveller" class="form-control font-weight-bold grey-text text-center p-0" placeholder="Client" value="{{$inquires->traveller}}">
                                                    {{--<label for="inputIconEx2">Payment Method</label>--}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-3">
                                    {{--<div class="md-form m-0">--}}
                                        {{--<input type="text" id="p_name" class="form-control font-weight-bold grey-text font-size-35 p-0 text-right" placeholder="Client" value="500">--}}
                                        {{--<label for="inputIconEx2">Payment Method</label>--}}
                                    {{--</div>--}}
                                    <div class="md-form input-group-sm m-0">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input placeholder="Full Name" type="text" id="p_a_cuenta" class="form-control font-weight-bold grey-text font-size-35 p-0 text-right" name="txt_name" value="{{$inquires->price}}">
                                    </div>
                                    {{--<div class="h1 font-weight-bold grey-text"><sup>$</sup>500</div>--}}
                                    {{--<div class="font-weight-bold grey-text">15 Jul 2018</div>--}}
                                    <div class="md-form m-0">
                                        @php
                                            date_default_timezone_set('America/Lima');
                                            $date_d = strftime("%d %b %Y",strtotime(date("Y-m-d")));
                                            $date_a = date("Y-m-d");

                                        @endphp
                                        <input type="text" id="p_package" class="form-control font-weight-bold grey-text p-0 text-right" placeholder="Payment Method" value="{{$date_d}}">
                                        {{--<label for="inputIconEx2">Payment Method</label>--}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center">
                                {{--<div class="col">--}}
                                    {{----}}
                                {{--</div>--}}
                                <div class="col-6">
                                    <select class="selectpicker w-100 mt-3" data-live-search="true" onchange="save_package({{$inquires->id}})" id="sp_package">

                                        @foreach($package as $pack)
                                            @if ($pack->id == $inquires->id_paquetes)
                                                @php
                                                    $selected = "selected";
                                                @endphp
                                            @else
                                                @php
                                                    $selected = "";
                                                @endphp
                                            @endif
                                            <option data-tokens="ketchup mustard" value="{{$pack->id}}" {{$selected}}>{{$pack->codigo}}: {{$pack->titulo}}</option>
                                        @endforeach
                                    </select>
                                    <div class="md-form">
                                        <i class="fas fa-pen-alt prefix grey-text"></i>
                                        <input type="text" id="t_concept" class="form-control font-weight-bold" placeholder="Concept">
                                        {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{--<div class="row align-items-center">--}}
                                {{--<div class="col">--}}
                                    {{--<div class="md-form ">--}}
                                        {{--<div class="md-form">--}}
                                            {{--<i class="fas fa-credit-card prefix grey-text"></i>--}}
                                            {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method" disabled>--}}
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<div class="md-form ">--}}
                                        {{--<div class="md-form">--}}
                                            {{--<i class="fas fa-qrcode prefix grey-text"></i>--}}
                                            {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Transaction" disabled>--}}
                                            {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<div class="md-form ">--}}
                                        {{--<input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-center" value="27-05-2018" disabled>--}}
                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<div class="md-form ">--}}
                                        {{--<input placeholder="Amount to Pay" type="text" id="inputPlaceholderEx" class="form-control text-right" value="500" disabled>--}}
                                        {{--<label for="inputPlaceholderEx">Amount to Pay</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col text-center">--}}
                                    {{--<i class="fa fa-check font-weight-bold"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            @if($count_pay > 0)
                                @foreach($payment->where('estado', 1) as $payments)
                                    <form id="t_form" role="form">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                {{--<div class="md-form ">--}}
                                                {{--<div class="md-form">--}}
                                                {{--<i class="fas fa-credit-card prefix grey-text"></i>--}}
                                                {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method">--}}
                                                {{--<label for="inputIconEx2">Payment Method</label>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-credit-card prefix grey-text"></i></label>
                                                    </div>
                                                    <select class="custom-select" disabled>
                                                        <option value="VISA" selected>VISA</option>
                                                        <option value="WESTERN UNION">WESTERN UNION</option>
                                                        <option value="BANCO">BANCO</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <div class="md-form ">
                                                    <div class="md-form">
                                                        <i class="fas fa-qrcode prefix grey-text"></i>
                                                        <input type="text" class="form-control text-right font-weight-bold" placeholder="Transaction" value="{{$payments->transaccion}}" disabled>
                                                        {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="md-form ">
                                                    <input placeholder="Payment Day" type="text" class="form-control text-center datepicker font-weight-bold" value="{{$payments->fecha_a_pagar}}" disabled>
                                                    {{--<label for="inputPlaceholderEx">Date</label>--}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="md-form ">
                                                    <input placeholder="Amount to Pay" type="text" class="form-control text-right font-weight-bold" value="{{$payments->a_cuenta}}" disabled>
                                                    <label for="t_amount" id="" class="text-danger d-none">Exceeded Amount</label>
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                {{--<button class="btn btn-sm btn-primary btn-lg" id="btn_pay" onclick="register_pay({{$inquires->id}})">Register Payment</button>--}}
                                                {{--<i class="fas fa-spinner font-weight-bold text-primary fa-pulse d-none" id="t_load"></i>--}}
                                                <i class="fa fa-check font-weight-bold" id="t_check"></i>
                                            </div>

                                        </div>
                                    </form>
                                @endforeach

                                    @foreach($payment_a as $payment_as)
                                        <form id="t_form" role="form">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    {{--<div class="md-form ">--}}
                                                    {{--<div class="md-form">--}}
                                                    {{--<i class="fas fa-credit-card prefix grey-text"></i>--}}
                                                    {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method">--}}
                                                    {{--<label for="inputIconEx2">Payment Method</label>--}}
                                                    {{--</div>--}}
                                                    {{--</div>--}}

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-credit-card prefix grey-text"></i></label>
                                                        </div>
                                                        <select class="custom-select" id="t_medio">
                                                            <option value="VISA" selected>VISA</option>
                                                            <option value="WESTERN UNION">WESTERN UNION</option>
                                                            <option value="BANCO">BANCO</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="md-form ">
                                                        <div class="md-form">
                                                            <i class="fas fa-qrcode prefix grey-text"></i>
                                                            <input type="text" id="t_transaction" class="form-control text-right font-weight-bold" placeholder="Transaction">
                                                            {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="md-form ">
                                                        <input placeholder="Payment Day" type="text" id="t_date" class="form-control text-center datepicker font-weight-bold" value="{{$payment_as->fecha_a_pagar}}">
                                                        <input type="hidden" id="id_payment" value="{{$payment_as->id}}">
                                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="md-form ">
                                                        <input placeholder="Amount to Pay" type="text" id="t_amount" class="form-control text-right font-weight-bold" value="{{$payment_as->a_cuenta}}" >
                                                        <input type="hidden" id="th_amount" value="{{$payment_as->a_cuenta}}" >
                                                        <label for="t_amount" id="t_label_amount" class="text-danger d-none">Exceeded Amount</label>
                                                    </div>
                                                </div>
                                                <div class="col text-center">
                                                    <button type="button" class="btn btn-sm btn-primary btn-lg" id="btn_pay" onclick="register_pay({{$inquires->id}})">Register Payment</button>
                                                    <i class="fas fa-spinner font-weight-bold text-primary fa-pulse d-none" id="t_load"></i>
                                                    <i class="fa fa-check font-weight-bold d-none" id="t_check"></i>
                                                </div>

                                            </div>
                                        </form>

                                        <form id="n_form" class="d-none">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="md-form">
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
                                                    <div class="md-form">
                                                        <input placeholder="Payment Day" type="text" id="n_date" class="form-control text-center datepicker font-weight-bold text-secondary">
                                                        <input type="hidden" id="id_payment" value="{{$payment_as->id}}">
                                                        {{--<label for="inputPlaceholderEx">Date</label>--}}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="md-form ">
                                                        <input placeholder="Amount to Pay" type="text" id="n_amount" class="form-control text-right" value="">
                                                        {{--<label for="inputPlaceholderEx">Amount to Pay</label>--}}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-sm btn-amber btn-lg" id="btn_pay_next" onclick="register_pay_next({{$inquires->id}})">register your payments</button>
                                                    <i class="fas fa-spinner font-weight-bold text-primary fa-pulse d-none" id="tn_load"></i>
                                                    <i class="fa fa-check font-weight-bold d-none" id="tn_check"></i>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach


                                    <div class="row justify-content-center d-none" id="t_alert">
                                        <div class="col-6">
                                            <div class="alert alert-success alert-dismissible text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>Registro satisfactorio</strong>. Se envió  un recibo de pago a <b>{{$inquires->email}}</b> y una copia a Llama Payment.
                                            </div>
                                        </div>
                                    </div>


                            @else
                                <form id="t_form" role="form">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            {{--<div class="md-form ">--}}
                                            {{--<div class="md-form">--}}
                                            {{--<i class="fas fa-credit-card prefix grey-text"></i>--}}
                                            {{--<input type="text" id="inputIconEx2" class="form-control" placeholder="Payment Method">--}}
                                            {{--<label for="inputIconEx2">Payment Method</label>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-credit-card prefix grey-text"></i></label>
                                                </div>
                                                <select class="custom-select" id="t_medio">
                                                    <option value="VISA" selected>VISA</option>
                                                    <option value="WESTERN UNION">WESTERN UNION</option>
                                                    <option value="BANCO">BANCO</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="md-form ">
                                                <div class="md-form">
                                                    <i class="fas fa-qrcode prefix grey-text"></i>
                                                    <input type="text" id="t_transaction" class="form-control text-right font-weight-bold" placeholder="Transaction">
                                                    {{--<label for="inputIconEx2">Transaction Code</label>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form ">
                                                <input placeholder="Payment Day" type="text" id="t_date" class="form-control text-center datepicker font-weight-bold" value="">
                                                {{--<label for="inputPlaceholderEx">Date</label>--}}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form ">
                                                <input placeholder="Amount to Pay" type="text" id="t_amount" class="form-control text-right font-weight-bold" value="{{$inquires->price}}" >
                                                <input type="hidden" id="th_amount" value="{{$inquires->price}}" >
                                                <input type="hidden" id="th_amount" value="" >
                                                <label for="t_amount" id="t_label_amount" class="text-danger d-none">Exceeded Amount</label>
                                            </div>
                                        </div>
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-sm btn-primary btn-lg" id="btn_pay" onclick="register_pay({{$inquires->id}})">Register Payment</button>
                                            <i class="fas fa-spinner font-weight-bold text-primary fa-pulse d-none" id="t_load"></i>
                                            <i class="fa fa-check font-weight-bold d-none" id="t_check"></i>
                                        </div>

                                    </div>
                                </form>


                                <form id="n_form" class="d-none">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="md-form">
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
                                            <div class="md-form">
                                                <input placeholder="Payment Day" type="text" id="n_date" class="form-control text-center datepicker font-weight-bold text-secondary">
                                                {{--<input type="hidden" id="id_payment" value="{{$payments->id}}">--}}
                                                {{--<label for="inputPlaceholderEx">Date</label>--}}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="md-form ">
                                                <input placeholder="Amount to Pay" type="text" id="n_amount" class="form-control text-right" value="">
                                                {{--<label for="inputPlaceholderEx">Amount to Pay</label>--}}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-amber btn-lg" id="btn_pay_next" onclick="register_pay_next({{$inquires->id}})">register your payments</button>
                                            <i class="fas fa-spinner font-weight-bold text-primary fa-pulse d-none" id="tn_load"></i>
                                            <i class="fa fa-check font-weight-bold d-none" id="tn_check"></i>
                                        </div>
                                    </div>
                                </form>

                                <div class="row justify-content-center d-none" id="t_alert">
                                    <div class="col-6">
                                        <div class="alert alert-success alert-dismissible text-center" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Registro satisfactorio</strong>. Se envió  un recibo de pago a <b>{{$inquires->email}}</b> y una copia a Llama Payment.
                                        </div>
                                    </div>
                                </div>

                            @endif





                            <div class="row d-none">
                                <div class="col">



                                        <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666;width: 100%;" marginheight="0" marginwidth="0">
                                            <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="100%" color="#666666">
                                                <tr>
                                                    <td>
                                                        <a target="_blank" href="http://llama.tours/">
                                                            <img src="{{asset('images/logo-llama.png')}}" data-holder-rendered="true" width="300">
                                                        </a>
                                                    </td>
                                                    <td style="text-align: right;">
                                                        <h2 style="font-size: 35px; color: #4285f4 ;">
                                                            <a target="_blank" href="#">
                                                                LlamaTours
                                                            </a>
                                                        </h2>
                                                        <p style="margin: 0; padding: 0;"> Av. Sol 948, dep. 315, Cusco - Cusco</p>
                                                        <p style="margin: 0; padding: 0;">+51 (084) 206931</p>
                                                        <p style="margin: 0; padding: 0;">info@llama.tours</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <hr style="display: block; width: 100%;">
                                            <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%;" marginheight="0" marginwidth="0">
                                                    <tr>
                                                        <td>
                                                            <h2 style="font-size: 16px; color: #4e4d50">INVOICE TO:</h2>
                                                            <h2 style="font-size: 30px;">John Doe</h2>
                                                            {{--<div class="address">796 Silver Harbour, TX 79273, US</div>--}}
                                                            <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                                            <div class="date">Date of Invoice: 01/10/2018</div>
                                                            {{--<div class="date">Due Date: 30/10/2018</div>--}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%;" marginheight="0" marginwidth="0">
                                                    <thead>
                                                    <tr style="padding: 15px; background: #eee; border-bottom: 1px solid #fff;">
                                                        <th style="padding: 15px;">#</th>
                                                        <th style="text-align: left; padding: 15px;">DESCRIPTION</th>
                                                        <th style="text-align: center;">PAYMENT DATE</th>
                                                        <th style="text-align: right; padding: 15px;">TOTAL</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr style="padding: 15px; background: #eee;">
                                                        <td style="color: #fff; font-size: 25px; background: #ff9200; padding: 15px; text-align: center;">01</td>
                                                        <td style="text-align: left; padding: 15px;">
                                                            <h3>GTP500: Classic Cusco x2</h3>
                                                            {{--Creating a recognizable design solution based on the company's existing visual identity--}}
                                                        </td>
                                                        <td style="text-align: center;">29 jul 2018</td>
                                                        <td style="color: #fff; font-size: 25px; background: #ff9200; padding: 15px; text-align: right;">$400.00</td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td style="font-size: 18px; padding: 15px; text-align: right;">SUBTOTAL</td>
                                                        <td style="font-size: 25px; padding: 15px; text-align: right; border-bottom: 1px solid #000;">$400.00</td>
                                                    </tr>
                                                    {{--<tr>--}}
                                                    {{--<td colspan="1"></td>--}}
                                                    {{--<td colspan="3">PENDING</td>--}}
                                                    {{--<td>$100.00</td>--}}
                                                    {{--</tr>--}}
                                                    <tr>
                                                        <td colspan="2" style="font-size: 30px; font-weight: bold; color: #4285f4 ;">Thank you!</td>
                                                        <td style="font-size: 18px; padding: 15px; text-align: right; color: #4285f4 ;">GRAND TOTAL</td>
                                                        <td style="font-size: 18px; padding: 15px; text-align: right; color: #4285f4 ;">$400.00</td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                {{--<div class="thanks">Thank you!</div>--}}

                                            <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%;" marginheight="0" marginwidth="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <p style="margin: 0; padding: 0;"><b style="font-weight: bold;">Price per person:</b> 500/2 = $250.00</p>
                                                            <p style="margin: 0; padding: 0;"><strong style="font-weight: bold; color: red;">Outstanding: $100.00</strong></p>
                                                            <p style="margin: 0; padding: 0; font-weight: bold;"><span style="background: yellow; padding: 5px; border-radius: 5px;" class="yellow p-1 rounded">Next Payment Date: 28 Jul 2018</span></p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%; margin-top: 30px;" marginheight="0" marginwidth="0">
                                                    <caption>Means of payment</caption>
                                                    <tbody>
                                                    <tr style="padding: 15px; background: #eee;">
                                                        <td style="padding: 15px;">1</td>
                                                        <td>VISA</td>
                                                        <td style="text-align: center">12554648874</td>
                                                        <td style="padding: 15px; text-align: right;">27 jul 2018</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%; margin-top: 30px;" marginheight="0" marginwidth="0">
                                                <tbody>
                                                    <tr style="padding-left: 6px;border-left: 6px solid #3989c6;">
                                                        <td style="padding: 10px; font-weight: bold;">NOTICE:</td>
                                                        <td>A finance charge of 1.5% will be made on unpaid balances after 30 days.</td>
                                                    </tr>
                                                <tr>

                                                    <td colspan="2">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td colspan="2"  style="text-align: center;">Invoice was created on a computer and is valid without the signature and seal.</td>
                                                    </tr>
                                                </table>
                                            <tbody>
                                        </table>





                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endif
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


        $("#t_amount").on('keyup', function() {
            var amount = parseFloat($("#t_amount").val());
            var hamount = parseFloat($("#th_amount").val());
            var month_total = "{{$inquires->price}}";
            if (amount < hamount){
                $("#n_form").removeClass('d-none');
                var total = hamount - amount;
                // console.log(total+'='+hamount+'-'+amount+'------'+hamount);
                $('#n_amount').val(total);
                $('#t_label_amount').addClass('d-none');
                $('#btn_pay').addClass('d-none');
                // alert(total);

            }else{
                $("#n_form").addClass('d-none');
                $('#t_label_amount').removeClass('d-none');
                $('#btn_pay').removeClass('d-none');
            }

            if(amount == hamount){
                $('#t_label_amount').addClass('d-none');
                $('#btn_pay').removeClass('d-none');
            }

        });

        function register_pay(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });

            $("#btn_pay").attr("disabled", true);

            var s_name = $("#p_name").val();
            var s_email = $("#p_email").val();
            var s_traveller = $("#p_traveller").val();
            var s_concept = $("#t_concept").val();

            var s_package = $("#sp_package").val();


            var s_medio = $("#t_medio").val();
            var s_transaction = $("#t_transaction").val();
            var s_date = $('#t_date').val();
            var s_amount = $('#t_amount').val();

            var s_a_cuenta = $('#p_a_cuenta').val();

            var sid_payment = $('#id_payment').val();


            if (s_amount.length == 0){
                $('#t_amount').css("border-bottom", "2px solid #FF0000");
                var amount_f = "false";
            }else{
                var amount_f = "true";
            }

            if (s_date.length == 0){
                $('#t_date').css("border-bottom", "2px solid #FF0000");
                var amount_f = "false";
            }else{
                var amount_f = "true";
            }

            if(amount_f == "true"){
                var datos = {
                    "txt_medio" : s_medio,
                    "txt_transaction" : s_transaction,
                    "txt_date" : s_date,
                    "txt_amount" : s_amount,
                    "txt_idinquire" : id,

                    "txt_name" : s_name,
                    "txt_email" : s_email,
                    "txt_traveller" : s_traveller,
                    "txt_concept" : s_concept,
                    "txt_package" : s_package,
                    "txt_a_cuenta" : s_a_cuenta,

                    "txt_idpayment" : sid_payment,
                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('payment_store_path')}}",
                    type:  'post',
                    beforeSend: function () {
                        // $('#de_send').removeClass('show');
                        $("#btn_pay").addClass('d-none');
                        $("#t_load").removeClass('d-none');
                    },
                    success:  function (response) {
                        // $('#t_form')[0].reset();
                        $('#t_check').removeClass('d-none');
                        $("#t_load").addClass('d-none');
                        $('#t_alert').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        $("#t_alert").fadeIn('slow');
                        $("#btn_pay").removeAttr("disabled");
                    }
                });
            } else{
                $("#btn_pay").removeAttr("disabled");
            }


        }

        function register_pay_next(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });

            $("#btn_pay_next").attr("disabled", true);

            var s_name = $("#p_name").val();
            var s_email = $("#p_email").val();
            var s_traveller = $("#p_traveller").val();
            var s_concept = $("#t_concept").val();

            var s_mdate = $("#n_date").val();
            var s_mamount = $("#n_amount").val();

            var s_package = $("#sp_package").val();


            var s_medio = $("#t_medio").val();
            var s_transaction = $("#t_transaction").val();
            var s_date = $('#t_date').val();
            var s_amount = $('#t_amount').val();

            var s_a_cuenta = $('#p_a_cuenta').val();

            var sid_payment = $('#id_payment').val();


            if (s_mdate.length == 0 ){
                $('#n_date').css("border-bottom", "2px solid #FF0000");
                var s_mdate_f = "false";
            }else{
                var s_mdate_f = "true";
            }

            if(s_mdate_f == "true"){
                var datos = {
                    "txt_medio" : s_medio,
                    "txt_transaction" : s_transaction,
                    "txt_date" : s_date,
                    "txt_amount" : s_amount,
                    "txt_idinquire" : id,

                    "txt_name" : s_name,
                    "txt_email" : s_email,
                    "txt_traveller" : s_traveller,
                    "txt_concept" : s_concept,
                    "txt_package" : s_package,
                    "txt_a_cuenta" : s_a_cuenta,

                    "txt_mdate" : s_mdate,
                    "txt_mamount" : s_mamount,

                    "txt_sid_payment" : sid_payment,
                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('payment_store_next_path')}}",
                    type:  'post',
                    beforeSend: function () {
                        // $('#de_send').removeClass('show');
                        $("#btn_pay_next").addClass('d-none');
                        $("#tn_load").removeClass('d-none');
                    },
                    success:  function (response) {
                        // $('#t_form')[0].reset();
                        $('#tn_check').removeClass('d-none');
                        $("#tn_load").addClass('d-none');
                        $('#t_alert').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        $("#t_alert").fadeIn('slow');
                        $("#btn_pay_next").removeAttr("disabled");
                    }
                });
            } else{
                $("#btn_pay_next").removeAttr("disabled");
            }


        }


    </script>
@endpush
