@extends('layouts.default')
@section('content')
    <div class="row sticky-top sticky-top-50 bg-white">
        <div class="col">
            <div class="mail-option py-2 mb-0">
                {{--<div class="chk-all">--}}
                {{--<input type="checkbox" class="mail-checkbox mail-group-checkbox">--}}
                {{--<div class="btn-group">--}}
                {{--<a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">--}}
                {{--All--}}
                {{--<i class="fa fa-angle-down "></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="#"> None</a></li>--}}
                {{--<li><a href="#"> Read</a></li>--}}
                {{--<li><a href="#"> Unread</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                        <i class="fas fa-redo-alt"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                        <i class=" fa fa-trash"></i>
                    </a>
                </div>

                <ul class="list-unstyled inbox-pagination mb-0">
                    <li><span>1-50 of 234</span></li>
                    <li>
                        <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                    </li>
                    <li>
                        <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form id="h_form" role="form">
        {{csrf_field()}}
        @foreach($inquire as $inquires)
        @endforeach

        <input type="hidden" id="id_inquire" value="{{$inquires->id}}">

        @if ($inquires->id_paquetes == 0)
            <div class="row mt-3 justify-content-center d-none" id="sp_alert">
                <div class="col-10">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <b class="d-block"><strong>Asignacion completa</strong> de paquete. :)</b>
                    </div>
                </div>
            </div>
            <div class="row my-3 align-items-center">
                <div class="col">
                    <select class="selectpicker w-100" data-live-search="true" onchange="save_package({{$inquires->id}})" id="sp_package">
                        @foreach($package as $pack)
                            <option data-tokens="ketchup mustard" value="{{$pack->id}}">{{$pack->codigo}}: {{$pack->titulo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <i class="fas fa-spinner fa-pulse fa-2x text-primary d-none" id="sp_load"></i>
        @else

            <div class="row my-3 align-items-center">
                    @foreach($package->where('id', $inquires->id_paquetes) as $packages)
                    @endforeach

                <div class="col">
                    {{--<select class="selectpicker w-100" data-live-search="true" onchange="location = this.value;" id="h_package">--}}
                        <select class="selectpicker w-100" data-live-search="true" onchange="save_package({{$inquires->id}})" id="sp_package">

                        @foreach($package as $pack)
                            @if ($pack->id == $id_paquete)
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
                </div>

            </div>
        @endif
        <div class="row my-5">
            <div class="col">
                <div class="card yellow">
                    <div class="card-body">
                        {{$inquires->comments}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                            <div class="row">
                                <div class="col md-form form-group">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="email" id="h_email" class="form-control validate" value="{{$inquires->email}}">
                                    <label for="h_email" data-error="wrong" data-success="right">Email</label>
                                </div>
                                <div class="col md-form form-group">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="h_name" class="form-control validate" value="{{$inquires->name}}">
                                    <label for="h_name" data-error="wrong" data-success="right">Traveller Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col md-form form-group">
                                    <i class="fa fa-bookmark prefix grey-text"></i>
                                    <input type="text" id="h_category" class="form-control validate" value="{{$inquires->category}}">
                                    <label for="h_category" data-error="wrong" data-success="right">Category</label>
                                </div>
                                <div class="col md-form form-group">
                                    <i class="fa fa-calendar prefix grey-text"></i>
                                    <input type="text" id="h_date" class="form-control validate" value="{{$inquires->traveldate}}">
                                    <label for="h_date" data-error="wrong" data-success="right">Travel Date</label>
                                </div>
                                <div class="col md-form form-group">
                                    <i class="fa fa-calendar-alt prefix grey-text"></i>
                                    <input type="text" id="h_days" class="form-control validate" value="{{$inquires->duration}}">
                                    <label for="h_days" data-error="wrong" data-success="right">Durations (days)</label>
                                </div>
                                <div class="col md-form form-group">
                                    <i class="fa fa-phone prefix grey-text"></i>
                                    <input type="text" id="h_phone" class="form-control validate" value="{{$inquires->phone}}">
                                    <label for="h_phone" data-error="wrong" data-success="right">Number Phone</label>
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
        @php $k=0; @endphp
        @if ($inquires->id_paquetes > 0)
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col">

                            @foreach($itinerary as $itin)
                                <div class="row mt-4 align-items-center no-gutters">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-1">
                                                <div class="md-form form-lg">
                                                    <input type="text" id="h_day_{{$itin->id}}" name="h_day[]" class="form-control form-control-lg font-weight-bold dark-grey-text" value="{{$itin->dia}}">
                                                    <label for="h_day_{{$itin->id}}">Day</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="md-form form-lg">
                                                    <input type="text" id="h_title_{{$itin->id}}" name="h_title[]" class="form-control form-control-lg font-weight-bold orange-text" value="{{ucwords(strtolower($itin->titulo))}}">
                                                    <label for="h_title_{{$itin->id}}">Title</label>
                                                </div>
                                                {{--Day 1: Cusco Arrival --}}
                                                {{--<span class="badge badge-dark">$1200<small>USD</small></span>--}}
                                            </div>
                                            {{--<div class="col-3">--}}
                                            {{--<div class="md-form form-lg">--}}
                                            {{--<input type="text" id="inputLGEx" class="form-control form-control-lg" value="1289">--}}
                                            {{--<label for="inputLGEx">Price <small>(USD$)</small></label>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--Day 1: Cusco Arrival --}}
                                            {{--<span class="badge badge-dark">$1200<small>USD</small></span>--}}

                                            <div class="col-12">
                                                <div class="md-form mt-0">
                                                    <textarea id="editor-{{$itin->id}}" name="h_resumen[]" class="editor-{{$itin->id}}" rows="2">{{$itin->resumen}}</textarea>
                                                    {{--<input type="hidden" id="h_resumen" name="h_resumen[]" value="{{$itin->resumen}}">--}}
                                                    {{--@php echo $itin->resumen @endphp--}}
                                                    {{--<label for="text2">Auto-resizing textarea</label>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto field_itinerary">
                                        <a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>
                                    </div>
                                </div>
                                @php $k++; @endphp
                            @endforeach

                            <div class="field_itinerary2">

                            </div>

                            <a href="javascript:void(0);" class="add_btn_itinerary" title="Add field"><i class="fas fa-plus text-success"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="font-weight-bold orange-text">Destinations</h5>
                                @foreach($paquete_destino as $paquete_destinos)

                                        <div class="row field_wrapper align-items-center md-form px-3 my-1">
                                            {{--<input type="hidden" id="destinos_{{$paquete_destinos->id}}" name="destinations[]" value="{{$paquete_destinos->destinos->id}}">--}}
                                            <input type="text" class="form-control form-control-sm col-6 autocomplete_destinos" id="destinos_{{$paquete_destinos->id}}" name="destinations[]" value="{{$paquete_destinos->destinos->nombre}}">
                                            {{--<label class="custom-control-label" for="destinos_{{$paquete_destinos->id}}">{{ucwords(strtolower($paquete_destinos->destinos->nombre))}}</label>--}}
                                            <a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>
                                        </div>

                                @endforeach

                                <div class="field_wrapper2">
                                    <div>
                                        {{--<input type="text" name="field_name[]" value=""/>--}}
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus text-success"></i></a>
                                {{--<input type="text" id="q2">--}}

                                {{--{{ Form::open(['action' => ['SearchController@searchUser'], 'method' => 'GET']) }}--}}
                                {{--{{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Enter name'])}}--}}
                                {{--{{ Form::submit('Search', array('class' => 'button expand')) }}--}}
                                {{--{{ Form::close() }}--}}


                                    {{--<input type="text" name="q" value="" id="q" class="form-control form-control-sm col autocomplete"/>--}}

                                {{--<div class="row align-items-center md-form w-25 px-3 my-2">--}}
                                    {{--<input type="text" name="field_name[]" value="" id="q" class="form-control form-control-sm col "/>--}}
                                {{--</div>--}}



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-weight-bold orange-text">Included</h5>
                                @foreach($incluye as $incluidos)
                                    <div class="row field_included align-items-center md-form px-3 my-1">
                                        <input type="text" class="form-control form-control-sm col autocomplete_included" id="incluye_{{$incluidos->id}}" name="incluye[]" value="{{$incluidos->incluye}}">
                                        {{--<label class="custom-control-label" for="incluye_{{$incluidos->id}}">{{$incluidos->incluye}}</label>--}}
                                        <a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>
                                    </div>
                                @endforeach
                                <div class="field_included2">
                                    <div>
                                        {{--<input type="text" name="field_name[]" value=""/>--}}
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="add_btn_included" title="Add field"><i class="fas fa-plus text-success"></i></a>
                            </div>
                            <div class="col-12 mt-3">
                                <h5 class="font-weight-bold orange-text">Not Included</h5>
                                @foreach($no_incluye as $no_incluidos)
                                    <div class="row field_no_included align-items-center md-form px-3 my-1">
                                        <input type="text" class="form-control form-control-sm col autocomplete_no_included" id="no_incluye_{{$no_incluidos->id}}" name="noincluye[]" value="{{$no_incluidos->noincluye}}">
{{--                                        <label class="custom-control-label" for="no_incluye_{{$no_incluidos->id}}">{{$no_incluidos->noincluye}}</label>--}}
                                        <a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>
                                    </div>
                                @endforeach
                                <div class="field_no_included2">
                                    <div>
                                        {{--<input type="text" name="field_name[]" value=""/>--}}
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="add_btn_no_included" title="Add field"><i class="fas fa-plus text-success"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold orange-text">Prices</h5>
                        <div class="alert alert-primary">
                            * Si desea puede reservar las actividades por separado
                        </div>
                        <div class="card-deck mb-3 text-center">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Without Hotels</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">
                                        <div class="md-form input-group input-group-lg mt-0 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            @foreach($price as $prices)
                                                @if ($prices->estrellas == 2)
                                                    <input type="text" class="form-control font-weight-bold text-center" aria-label="Amount (to the nearest dollar)" id="h_precio_ch" value="{{$prices->precio}}">
                                                @endif
                                            @endforeach
                                            <div class="input-group-append">
                                                <span class="input-group-text">USD</span>
                                            </div>
                                        </div>
                                        <small class="text-muted"></small></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="text-primary">Price per person.</li>
                                        {{--<li>2 GB of storage</li>--}}
                                        {{--<li>Email support</li>--}}
                                        {{--<li>Help center access</li>--}}
                                    </ul>
                                    {{--<button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>--}}
                                </div>
                            </div>
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Without Hotels</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">
                                        <div class="md-form input-group input-group-lg mt-0 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control font-weight-bold text-center" aria-label="Amount (to the nearest dollar)" id="h_precio_sh" value="{{$packages->precio}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">USD</span>
                                            </div>
                                        </div>
                                    </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="text-primary">Price per person.</li>
                                        {{--<li>10 GB of storage</li>--}}
                                        {{--<li>Priority email support</li>--}}
                                        {{--<li>Help center access</li>--}}
                                    </ul>
                                    {{--<button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>--}}
                                </div>
                            </div>

                        </div>

                        <h5 class="font-weight-bold orange-text mt-5">Upgrades Opcionales</h5>
                        <p>Precios basados en doble acomodación</p>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-dark text-white text-center">
                                <th scope="col">Economic</th>
                                <th scope="col">Tourist</th>
                                <th scope="col">Superior</th>
                                <th scope="col">Luxury</th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr class="text-center">
                                @foreach($price as $prices)
                                    @if ($prices->estrellas == 2)
                                        <td>
                                            <div class="md-form input-group input-group-sm mt-0 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>

                                                    <input type="text" class="form-control font-weight-bold text-center" aria-label="Amount (to the nearest dollar)" id="h_precio_2" value="{{$prices->precio}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">USD</span>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                    @foreach($price as $prices)
                                        @if ($prices->estrellas == 3)
                                            <td>
                                                <div class="md-form input-group input-group-sm mt-0 mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>

                                                    <input type="text" class="form-control font-weight-bold text-center" aria-label="Amount (to the nearest dollar)" id="h_precio_3" value="{{$prices->precio}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">USD</span>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    @endforeach
                                    @foreach($price as $prices)
                                        @if ($prices->estrellas == 4)
                                            <td>
                                                <div class="md-form input-group input-group-sm mt-0 mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>

                                                    <input type="text" class="form-control font-weight-bold text-center" aria-label="Amount (to the nearest dollar)" id="h_precio_4" value="{{$prices->precio}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">USD</span>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    @endforeach
                                    @foreach($price as $prices)
                                        @if ($prices->estrellas == 5)
                                            <td>
                                                <div class="md-form input-group input-group-sm mt-0 mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>

                                                    <input type="text" class="form-control font-weight-bold text-center" aria-label="Amount (to the nearest dollar)" id="h_precio_5" value="{{$prices->precio}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">USD</span>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    @endforeach
                                {{--<td class="font-weight-bold h4"><sup><small>$</small></sup>50<small>USD</small></td>--}}
                                {{--<td class="font-weight-bold h4 orange darken-1"><sup><small>$</small></sup>1250<small>USD</small></td>--}}
                                {{--<td class="font-weight-bold h4"><sup><small>$</small></sup>20<small>USD</small></td>--}}
                                {{--<td class="font-weight-bold h4"><sup><small>$</small></sup>90<small>USD</small></td>--}}
                            </tr>

                            </tbody>
                        </table>


                        <span class="alert alert-dark d-block">
                            @foreach($otro as $otros)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="otros_{{$otros->id}}" name="otros[]" value="{{$otros->concepto}}: {{$otros->price}} - {{$otros->detalle}}" checked>
                                    <label class="custom-control-label" for="otros_{{$otros->id}}">{{$otros->concepto}}: <sup><small>$</small></sup><span class="font-weight-bold">{{$otros->price}}</span><small>UDS</small>   - {{$otros->detalle}}</label>
                                </div>
                            @endforeach
                        </span>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card rgba-deep-orange-light">
                    <div class="card-body">
                        <h5 class="font-weight-bold orange-text">Presentation</h5>
                        <div class="row">
                            <div class="col-2">
                                <b>to:</b>
                            </div>
                            <div class="col">
                                {{--hidalgo@gmail.com--}}
                                <div class="add-label">{{$inquires->email}}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <b>from:</b>
                            </div>
                            <div class="col-4">
                                {{--karina@llama.tours--}}
                                <select class="custom-select custom-select-sm" onchange="advisor()" id="h_advisor">
                                    {{--<option selected>Open this select menu</option>--}}
                                    @foreach($user as $users)
                                        @if ($inquires->idusuario == $users->id)
                                            @php $select_u = "selected"; @endphp
                                        @else
                                            @php $select_u = ""; @endphp
                                        @endif
                                        <option value="{{$users->id}}" {{$select_u}}>{{$users->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <textarea class="form-control editor-mess w-100" aria-label="With textarea" id="h_message" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="card rgba-deep-purple-light">
                        <div class="card-body">
                            <h5 class="font-weight-bold orange-text">farewell</h5>
                            {{--<div class="row">--}}
                                {{--<div class="col-2">--}}
                                    {{--<b>to:</b>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--hidalgo@gmail.com--}}
                                    {{--<div class="add-label">{{$inquires->email}}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row mb-3">--}}
                                {{--<div class="col-2">--}}
                                    {{--<b>from:</b>--}}
                                {{--</div>--}}
                                {{--<div class="col-4">--}}
                                    {{--karina@llama.tours--}}
                                    {{--<select class="custom-select custom-select-sm" onchange="advisor()" id="h_advisor">--}}
                                        {{--<option selected>Open this select menu</option>--}}
                                        {{--<option value="0">karina@llama.tours</option>--}}
                                        {{--<option value="1">paola@llama.tours</option>--}}
                                        {{--<option value="2">martin@llama.tours</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="">
                                <textarea class="form-control editor-mess-2 w-100" aria-label="With textarea" id="h_message" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{--<div class="row mt-4 karina">--}}
            {{--<div class="col">--}}
                {{--<div class="card bg-light">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-4 text-center">--}}
                                {{--<img src="https://scontent.flim5-1.fna.fbcdn.net/v/t1.0-9/31739806_993323907486435_1000599518791598080_n.jpg?_nc_cat=107&_nc_ht=scontent.flim5-1.fna&oh=dda0f6ac807e45167c5b86def2b4f24f&oe=5C3C4E5A" alt="paola" class="w-100 img-thumbnail">--}}
                                {{--<p class="small">TA. Karina Ñahui</p>--}}
                            {{--</div>--}}
                            {{--<div class="col">--}}
                                {{--<div class="row align-items-center">--}}
                                    {{--<div class="col-2">--}}
                                        {{--<img src="{{asset('images/logo-llama2.png')}}" alt="" class="w-100">--}}
                                    {{--</div>--}}
                                    {{--<div class="col">--}}
                                        {{--<h5 class="font-weight-bold orange-text mb-0">Karina Ñahui</h5>--}}
                                        {{--<span class="small">Travel Advisor</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-3">--}}
                                        {{--Phone:--}}
                                    {{--</div>--}}
                                    {{--<div class="col">--}}
                                        {{--+51 84 206 931--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-3">--}}
                                        {{--Site:--}}
                                    {{--</div>--}}
                                    {{--<div class="col">--}}
                                        {{--<a href="llana.tours">llama.tours</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-3">--}}
                                        {{--Email:--}}
                                    {{--</div>--}}
                                    {{--<div class="col">--}}
                                        {{--karina@llama.tours--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col">--}}
                                        {{--<a href=""><img src="{{asset('images/redes/whatsapp.png')}}" alt="" width="30"></a>--}}
                                        {{--<a href=""><img src="{{asset('images/redes/facebook.png')}}" alt="" width="30"></a>--}}
                                        {{--<a href=""><img src="{{asset('images/redes/instagram.png')}}" alt="" width="30"></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="row mt-4">
            <div class="col">
                <a href="" class="btn btn-light float-left">Save Mail <i class="fa fa-save"></i></a>
                {{--<a href="" class="btn btn-primary float-right" onclick="design()">Send Mail</a>--}}
                <button type="button" class="btn btn-primary float-right" id="h_submit" onclick="message()">Send</button>
                <i class="fas fa-spinner fa-pulse fa-2x text-primary float-right d-none" id="h_load"></i>
            </div>
        </div>

        <div class="row mt-3 justify-content-center d-none" id="h_alert">
            <div class="col-10">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <b class="d-block"><strong>Tu paquete fue enviado correctamente</strong>, revise su bandeja de entrada. :)</b>
                    <span>***Esta propuesta es enviado a su cliente y a usted. Se sugiere revisar su bandeja de <b>spam</b>.</span>
                </div>
            </div>
        </div>
        @endif
        {{--<div class="row">--}}
            {{--<div class="col">--}}
                {{--<div class="container">--}}
                    {{--<div style="font-family:Lato,sans-serif;font-size:15px;color:#666666" marginheight="0" marginwidth="0">--}}
                        {{--<table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="100%" color="#666666">--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<td bgcolor="#ffffff" width="100%" valign="top">--}}
                                    {{--<table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="90%">--}}
                                        {{--<tbody>--}}
                                        {{--<tr bgcolor="#ffffff">--}}
                                            {{--<td valign="top" style="padding:10px 35px 0 35px;color:#ffffff">--}}
                                                {{--<img class="CToWUd" width="350" alt="logo llama tours" src="http://llama.tours/images/logo-llama.png" style="vertical-align:top;max-width:220px">--}}
                                            {{--</td>--}}

                                        {{--</tr>--}}

                                        {{--<tr>--}}
                                            {{--<td style="padding:20px 0px 20px 50px">--}}
                                                {{--<p style="font-size:18px"><b>Estimado(a) </b>:sdsdsd</p>--}}
                                                {{--<p>sdsdsd</p>--}}
                                                {{--<p style="font-weight: bold; font-size: 18px">PAQUETE: sdsdsd</p>--}}
                                                {{--<center style="background:#f6f6f6; padding:10px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);border: 0;">--}}
                                                    {{--<table>--}}
                                                        {{--<tbody>--}}
                                                        {{--<tr>--}}
                                                            {{--<td style="text-align:left">--}}
                                                               {{--sdsdsd--}}
                                                                {{--@foreach($day as $days)--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia {{$days}}: {{$count}}</p>--}}
                                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque dolore ducimus enim excepturi exercitationem natus. Aliquam deleniti doloremque dolorum eaque eligendi facilis libero minima, nulla possimus quis, soluta voluptatum.</p>--}}
                                                                                                                            {{--@php echo $resumen; @endphp--}}
                                                                {{--@endforeach--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia 1: Titulo del paquete</p>--}}
                                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae culpa distinctio, enim fuga harum inventore ipsum, iste minima natus nobis pariatur, quia quo quos reiciendis similique totam veritatis voluptatibus?</p>--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia 1: Titulo del paquete</p>--}}
                                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae culpa distinctio, enim fuga harum inventore ipsum, iste minima natus nobis pariatur, quia quo quos reiciendis similique totam veritatis voluptatibus?</p>--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia 1: Titulo del paquete</p>--}}
                                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae culpa distinctio, enim fuga harum inventore ipsum, iste minima natus nobis pariatur, quia quo quos reiciendis similique totam veritatis voluptatibus?</p>--}}
                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}

                                                {{--<center style="margin-top: 30px; width: 100%">--}}
                                                    {{--<p style="font-weight: bold; font-size: 18px; text-align: left; margin: 0; color: #ff9800;">PRECIOS DE PROGRAMA DE 5 DIAS</p>--}}
                                                    {{--<p style="text-align: left"><strong style="font-weight: bold;">Precio por persona USD$.</strong> <span style="font-style: italic;">(basados en doble acomodación.)</span></p>--}}
                                                    {{--<table style="width: 100%">--}}
                                                        {{--<tbody>--}}
                                                        {{--<tr style="text-align: center;">--}}
                                                            {{--<td style="text-align:center">--}}
                                                                {{--<table style="text-align: center; width: 100%; background:#f6f6f6;">--}}
                                                                    {{--<tr style="text-align: center">--}}
                                                                        {{--<td style="font-size: 20px; font-weight: bold;">Con Hoteles</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr style="text-align: center">--}}
                                                                        {{--<td style="font-weight: bold; font-size: 25px">$sdsdusd</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr style="text-align: center">--}}
                                                                        {{--<td>Price per person.</td>--}}
                                                                    {{--</tr>--}}
                                                                {{--</table>--}}
                                                            {{--</td>--}}
                                                            {{--<td style="text-align:center">--}}
                                                                {{--<table style="text-align: center; width: 100%; background:#f6f6f6;">--}}
                                                                    {{--<tr style="text-align: center">--}}
                                                                        {{--<td style="font-size: 20px; font-weight: bold;">Sin Hoteles</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr style="text-align: center">--}}
                                                                        {{--<td style="font-weight: bold; font-size: 25px">$sdsdusd</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr style="text-align: center">--}}
                                                                        {{--<td>Price per person.</td>--}}
                                                                    {{--</tr>--}}
                                                                {{--</table>--}}

                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                        {{--<tr>--}}
                                                            {{--<td style="padding: 10px; background: #ff9800; color: white; border-radius: 0 0 5px" colspan="2">* Si desea puede reservar las actividades por separado</td>--}}
                                                            {{--<td></td>--}}
                                                        {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}

                                                {{--<center style="margin-top: 10px; width: 100%">--}}
                                                    {{--<h5>Hoteles, Tours, Transporte, Entradas, Trenes, Tranfers.</h5>--}}
                                                    {{--<table style="width: 100%; border: 1px solid #cccccc;">--}}
                                                        {{--<thead>--}}
                                                        {{--<tr style="background: #8d8d8d; color: white; text-align: center">--}}
                                                            {{--<th style="padding: 10px;">Economic</th>--}}
                                                            {{--<th>Tourist</th>--}}
                                                            {{--<th>Superior</th>--}}
                                                            {{--<th>Luxury</th>--}}
                                                        {{--</tr>--}}
                                                        {{--</thead>--}}
                                                        {{--<tbody>--}}

                                                        {{--<tr style="text-align: center;">--}}
                                                            {{--<td style="font-weight: bold; color: #181818">$1232usd</td>--}}
                                                            {{--<td style="font-weight: bold; color: #181818">sadasdusd</td>--}}
                                                            {{--<td style="font-weight: bold; color: #181818">$asasusd</td>--}}
                                                            {{--<td style="font-weight: bold; color: #181818">$sdsdusd</td>--}}
                                                        {{--</tr>--}}

                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                    {{--<p style="text-align: left; font-weight: bold;">***Precios basados en doble acomodación.</p>--}}
                                                {{--</center>--}}

                                                {{--<center style="margin-top: 30px; width: 100%">--}}
                                                    {{--<h5>Tours, Transporte, Entradas, Trenes, Tranfers.</h5>--}}
                                                    {{--<table style="width: 100%; border: 1px solid #cccccc;">--}}
                                                        {{--<tbody>--}}
                                                        {{--<tr style="background: #ff9800; color: white; text-align: center">--}}
                                                            {{--<th style="padding: 10px; font-size: 18px">5 días <span style="color: #0d0d0d; font-weight: bold;">SIN HOTELES: $500usd</span></th>--}}
                                                        {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                    {{--<p style="text-align: left; font-weight: bold;">***Precios basados en doble acomodación.</p>--}}
                                                {{--</center>--}}


                                                {{--<center style="margin-top: 30px; width: 100%">--}}
                                                    {{--<table style="width: 100%">--}}
                                                        {{--<tbody>--}}
                                                            {{--<tr style="text-align: center;">--}}
                                                                {{--<td style="text-align:center; width: 60%">--}}
                                                                    {{--<img src="{{asset('images/cuotas.jpg')}}" alt="" style="width: 100%">--}}
                                                                {{--</td>--}}
                                                                {{--<td style="text-align:left; width: 50%">--}}
                                                                    {{--<h5 style="font-weight: bold; font-size: 18px;">Facilidades de Pago hasta 6 cuotas.</h5>--}}
                                                                    {{--<p style="font-size: 16px;">Ejemplo: $776/6 = $129 pagos mensuales.</p>--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}


                                                {{--<center style="background:#f6f6f6; margin-top: 30px; padding:10px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);border: 0;">--}}
                                                    {{--<table style="width: 100%">--}}
                                                        {{--<tbody>--}}
                                                        {{--<tr>--}}
                                                            {{--<td style="text-align:left; float: left; width: 50%">--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Incluye:</p>--}}
                                                                {{--<ul>--}}
                                                                    {{--sdsdsd--}}
                                                                {{--</ul>--}}
                                                            {{--</td>--}}
                                                            {{--<td style="text-align:left; float: left; width: 100%">--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">No Incluye:</p>--}}
                                                                {{--<ul>--}}
                                                                    {{--sdsdsd--}}
                                                                {{--</ul>--}}
                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}

                                                {{--<hr style="margin: 40px 0">--}}
                                                {{--<center style="margin-top: 0px; width: 100%">--}}
                                                    {{--<p style="font-weight: bold; font-size: 18px; color: #4b4b4b; text-align: left; margin: 0; ">Tambien ofrecemos</p>--}}
                                                    {{--<p style="font-size: 16px; color: #4b4b4b; text-align: left ">Solo tours a la carta.</p>--}}
                                                    {{--<table style="width: 100%;">--}}
                                                        {{--<tr style="text-align: left;">--}}
                                                            {{--<td style="font-weight: bold; color: #181818">--}}
                                                                {{--<ul>--}}
                                                                    {{--sdsdsd--}}
                                                                {{--</ul>--}}
                                                                {{--<ul>--}}
                                                                    {{--<li><a href="">Machu Picchu Full Day: $220</a></li>--}}
                                                                {{--</ul>--}}
                                                                {{--<span><a href="">Ver más ...</a></span>--}}

                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}
                                                {{--<hr style="margin: 40px 0">--}}
                                                {{--<center style="background:#d6e9f8; padding:10px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);border: 0;">--}}
                                                    {{--<table style="width: 100%">--}}
                                                        {{--<tbody>--}}
                                                        {{--<tr>--}}
                                                            {{--<td style="text-align:left;">--}}
                                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">***</p>--}}
                                                                {{--<b class="font-weight-bold h5">***</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus iste nostrum pariatur placeat quis repudiandae ut. Labore, minus, quae. Aliquam blanditiis dolorum ex exercitationem fuga impedit molestias veritatis, voluptas!--}}
                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}
                                                {{--<hr style="margin: 40px 0">--}}
                                                {{--<center style="background:#f6f6f6; padding:10px;">--}}
                                                    {{--<table style="width: 100%">--}}
                                                        {{--<tbody>--}}
                                                        {{--<tr>--}}
                                                            {{--<td style="text-align:center; float: left; width: 30%">--}}
                                                                {{--<img src="https://scontent.flim5-1.fna.fbcdn.net/v/t1.0-9/31739806_993323907486435_1000599518791598080_n.jpg?_nc_cat=107&_nc_ht=scontent.flim5-1.fna&oh=dda0f6ac807e45167c5b86def2b4f24f&oe=5C3C4E5A" alt="" style="width: 100%">--}}
                                                                {{--<p style="font-size: 10px; text-align: center; margin: 0">TA. Karina Ñahui</p>--}}
                                                                {{--<a href=""><img src="{{asset('images/redes/whatsapp.png')}}" alt="" style="width: 20px;"></a>--}}
                                                                {{--<a href=""><img src="{{asset('images/redes/facebook.png')}}" alt="" style="width: 20px;"></a>--}}
                                                                {{--<a href=""><img src="{{asset('images/redes/instagram.png')}}" alt="" style="width: 20px;"></a>--}}
                                                            {{--</td>--}}
                                                            {{--<td style="text-align:left; float: left; width: 70%; padding-left: 20px;">--}}
                                                                {{--<table style="width: 100%">--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td style="width: 15%">--}}
                                                                            {{--<img src="{{asset('images/logo-llama2.png')}}" alt="" style="width: 100%">--}}
                                                                        {{--</td>--}}
                                                                        {{--<td style="width: 85%; padding-left: 10px;">--}}
                                                                            {{--<p style="font-weight: bold; font-size: 18px; color: #ff9800; margin: 0;">Karina Ñahui</p>--}}
                                                                            {{--<p style="font-size: 12px;">Travel Advisor</p>--}}
                                                                        {{--</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td colspan="2"><hr></td>--}}
                                                                        {{--<td></td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td>Phone:</td>--}}
                                                                        {{--<td>+51 84 206 931</td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td>Site:</td>--}}
                                                                        {{--<td><a href="llama.tours">llama.tours</a></td>--}}
                                                                    {{--</tr>--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td>Email:</td>--}}
                                                                        {{--<td><a href="mailto:karina@llama.tours">karina@llama.tours</a></td>--}}
                                                                    {{--</tr>--}}
                                                                {{--</table>--}}
                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}
                                                {{--<hr style="margin: 40px 0 ">--}}
                                                {{--<center style="margin-top: 0px; width: 100%">--}}
                                                    {{--<table style="width: 100%;">--}}
                                                        {{--<tr>--}}
                                                            {{--<td style="text-align:center;font-size:12px;padding:5px 15px;color:#999999">--}}
                                                                {{--<p>--}}
                                                                    {{--Visite Perú, tierra de los incas.--}}
                                                                {{--</p>--}}
                                                                {{--<img class="CToWUd" width="250" alt="logo llama tours" src="http://llama.tours/images/logo-llama.png" style="vertical-align:top;max-width:220px">--}}
                                                            {{--</td>--}}
                                                        {{--</tr>--}}
                                                    {{--</table>--}}
                                                {{--</center>--}}


                                            {{--</td>--}}
                                        {{--</tr>--}}


                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

    </form>

@endsection

@push('scripts')
    <script src='https://devpreview.tiny.cloud/demo/tinymce.min.js'></script>
    <script>

        tinymce.init({
            selector: "textarea",
            height: 280,
            menubar: false,
            browser_spellcheck : true,
            contextmenu: false,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor textcolor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste code help wordcount"
            ],
            toolbar: "undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",
            setup: function (editor) {
                editor.on("change", function () {
                    editor.save();
                });
            }
        });

        //editor
        ClassicEditor
            .create( document.querySelector( '.editor-mess' ) )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
                myEditor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '.editor-mess-2' ) )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
                myEditor2 = editor;
            } )
            .catch( error => {
                console.error( error );
            } );

        //email
        $("#h_email").on('keyup', function() {
            $('.add-label:last').text( $(this).val() );
        });
        //advisor
        function advisor() {
            var s_advisor = $("#h_advisor").val();
            if (s_advisor == '0'){
                $(".karina").removeClass('d-none');
                $(".paola").addClass('d-none');
            }else{
                $(".paola").removeClass('d-none');
                $(".karina").addClass('d-none');
            }

        }

        //formulario design
        function message(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });

            $("#submit_tip").attr("disabled", true);

            var filter=/^[A-Za-z][A-Za-z0-9_.]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;

            var s_day = document.getElementsByName('h_day[]');
            var $day = "";
            for (var i = 0, l = s_day.length; i < l; i++) {
                if (s_day[i].valueOf()) {
                    $day += s_day[i].value+'*';
                }
            }
            s_day = $day.substring(0,$day.length-1);

            var s_title = document.getElementsByName('h_title[]');
            var $title = "";
            for (var i = 0, l = s_title.length; i < l; i++) {
                if (s_title[i].valueOf()) {
                    $title += s_title[i].value+'*';
                }
            }
            s_title = $title.substring(0,$title.length-1);

            var s_resumen = document.getElementsByName('h_resumen[]');
            var $resumen = "";
            for (var i = 0, l = s_resumen.length; i < l; i++) {
                if (s_resumen[i].valueOf()) {
                    $resumen += s_resumen[i].value+'*';
                }
            }

            s_resumen = $resumen.substring(0,$resumen.length-1);

            var s_destinations = document.getElementsByName('destinations[]');
            var $destinations = "";
            for (var i = 0, l = s_destinations.length; i < l; i++) {
                if (s_destinations[i]) {
                    $destinations += s_destinations[i].value+'*';
                }
            }
            s_destinations = $destinations.substring(0,$destinations.length-3);

            var s_incluye = document.getElementsByName('incluye[]');
            var $incluye = "";
            for (var i = 0, l = s_incluye.length; i < l; i++) {
                if (s_incluye[i]) {
                    $incluye += s_incluye[i].value+'*';
                }
            }
            s_incluye = $incluye.substring(0,$incluye.length-1);

            var s_noincluye = document.getElementsByName('noincluye[]');
            var $noincluye = "";
            for (var i = 0, l = s_noincluye.length; i < l; i++) {
                if (s_noincluye[i]) {
                    $noincluye += s_noincluye[i].value+'*';
                }

            }
            s_noincluye = $noincluye.substring(0,$noincluye.length-1);

            var s_otros = document.getElementsByName('otros[]');
            var $otros = "";
            for (var i = 0, l = s_otros.length; i < l; i++) {
                if (s_otros[i].checked) {
                    $otros += s_otros[i].value+'*';
                }
            }
            s_otros = $otros.substring(0,$otros.length-3);

            {{--var $itinerary = "";--}}
            {{--var $k = '{{$k}}';--}}
            {{--// var $hresumen = 'hresumen';--}}
            {{--for (var i = 1, l = $k; i <= l; i++) {--}}
                {{--$itinerary += $('#h_resumen_'+i).val()+'*';--}}
            {{--}--}}
            {{--s_itinerary = $itinerary.substring(0,$itinerary.length-1);--}}

            {{--alert(s_itinerary);--}}

            var s_idinquire = $("#id_inquire").val();
            var s_email = $("#h_email").val();
            var s_name = $("#h_name").val();
            var s_category = $("#h_category").val();
            var s_date = $("#h_date").val();
            var s_days = $("#h_days").val();
            var s_phone = $("#h_phone").val();

            var s_precio_ch = $("#h_precio_ch").val();
            var s_precio_sh = $("#h_precio_sh").val();
            var s_precio_2 = $("#h_precio_2").val();
            var s_precio_3 = $("#h_precio_3").val();
            var s_precio_4 = $("#h_precio_4").val();
            var s_precio_5 = $("#h_precio_5").val();

            var s_message = myEditor.getData();
            var s_message2 = myEditor2.getData();

            var s_package = $("#sp_package").val();
            var s_advisor = $("#h_advisor").val();

            if (filter.test(s_email)){
                sendMail = "true";
            } else{
                $('#h_email').css("border-bottom", "2px solid #FF0000");
                sendMail = "false";
            }
            if (s_name.length == 0 ){
                $('#h_name').css("border-bottom", "2px solid #FF0000");
                var sendMail = "false";
            }

            if(sendMail == "true"){
                var datos = {

                        "txt_idinquire" : s_idinquire,
                        "txt_day" : s_day,
                    "txt_title" : s_title,
                    "txt_resumen" : s_resumen,

                    "txt_destinations" : s_destinations,

                    "txt_incluye" : s_incluye,
                    "txt_noincluye" : s_noincluye,

                    "txt_email" : s_email,
                    "txt_name" : s_name,
                    "txt_category" : s_category,
                    "txt_date" : s_date,
                    "txt_days" : s_days,
                    "txt_phone" : s_phone,

                    "txt_precio_ch" : s_precio_ch,
                    "txt_precio_sh" : s_precio_sh,

                    "txt_precio_2" : s_precio_2,
                    "txt_precio_3" : s_precio_3,
                    "txt_precio_4" : s_precio_4,
                    "txt_precio_5" : s_precio_5,

                    "txt_otros" : s_otros,

                    "txt_message" : s_message,
                    "txt_message2" : s_message2,

                    "txt_package" : s_package,
                    "txt_advisor" : s_advisor,
                    // "txt_itinerary" : s_itinerary,

                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('message_mail_path')}}",
                    type:  'post',

                    beforeSend: function () {

                        // $('#de_send').removeClass('show');
                        $("#h_submit").addClass('d-none');
                        $("#h_load").removeClass('d-none');
                    },
                    success:  function (response) {
                        $('#h_form')[0].reset();
                        $('#h_submit').removeClass('d-none');
                        $("#h_load").addClass('d-none');
                        $('#h_alert').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        $("#h_alert").fadeIn('slow');
                        $("#h_submit").removeAttr("disabled");
                    }
                });
            } else{
                $("#h_submit").removeAttr("disabled");
            }
        }

        $('.selectpicker').selectpicker();

        function save_package(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
            var s_idinquire = id;
            var s_idpackage = $("#sp_package").val();

            // alert(s_idpackage);

            if(s_idinquire > 0){
                var datos = {
                    "txt_idinquire" : s_idinquire,
                    "txt_idpackage" : s_idpackage
                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('update_inquire_p_path')}}",
                    type:  'post',

                    beforeSend: function () {

                        // $('#de_send').removeClass('show');
                        $("#sp_package").addClass('d-none');
                        $("#sp_load").removeClass('d-none');
                    },
                    success:  function (response) {
                        $('#h_form')[0].reset();
                        $("#sp_load").addClass('d-none');
                        $('#sp_alert').removeClass('d-none');
                        $('#sp_package').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        $("#sp_alert").fadeIn('slow');
                        window.location = response;
                    }
                });
            } else{
                $('#sp_package').removeClass('d-none');
            }

        }

        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation

            var addButton = $('.add_button'); //Add button selector
            var addButtonIncluded = $('.add_btn_included');
            var addButtonNoIncluded = $('.add_btn_no_included');
            var addButtonItinerary = $('.add_btn_itinerary');

            var wrapper = $('.field_wrapper'); //Input field wrapper
            var wrapper2 = $('.field_wrapper2'); //Input field wrapper

            var wrapper_included = $('.field_included'); //Input field wrapper field_included
            var wrapper_included2 = $('.field_included2'); //Input field wrapper field_included

            var wrapper_no_included = $('.field_no_included'); //Input field wrapper field_included
            var wrapper_no_included2 = $('.field_no_included2'); //Input field wrapper field_included

            var wrapper_itinerary = $('.field_itinerary'); //Input field wrapper field_included
            var wrapper_itinerary2 = $('.field_itinerary2'); //Input field wrapper field_included

            var $num_day = "{{$k+1}}";

            var fieldHTML = '' +
                '<div class="row align-items-center md-form px-3 my-1">' +
                '<input type="text" name="destinations[]" value="" class="form-control form-control-sm col-6 autocomplete_destinos"/>' +
                '<a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>' +
                '</div>'+ //New input field html
            '<script>'+
                '$( ".autocomplete_destinos" ).autocomplete({'+
                    'source: "{{route('autocomplete_path')}}",'+

                '});'+
            '<'+
                '/'+
                'script>';

            var fieldHTMLIncluded = '' +
                '<div class="row align-items-center md-form px-3 my-1">' +
                '<input type="text" name="incluye[]" value="" class="form-control form-control-sm col autocomplete_included"/>' +
                '<a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>' +
                '</div>'+ //New input field html
                '<script>'+
                '$( ".autocomplete_included" ).autocomplete({'+
                'source: "{{route('autocomplete_included_path')}}",'+
                '});'+
                '<'+
                '/'+
                'script>';

            var fieldHTMLNoIncluded = '' +
                '<div class="row align-items-center md-form px-3 my-1">' +
                '<input type="text" name="noincluye[]" value="" class="form-control form-control-sm col autocomplete_no_included"/>' +
                '<a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>' +
                '</div>'+ //New input field html
                '<script>'+
                '$( ".autocomplete_no_included" ).autocomplete({'+
                'source: "{{route('autocomplete_no_included_path')}}",'+
                '});'+
                '<'+
                '/'+
                'script>';

            var fieldHTMLItinerary = '' +
                '<div class="row mt-4 align-items-center no-gutters">'+
                '<div class="col">'+
                '<div class="row">'+
                '<div class="col-1">'+
                '<div class="md-form form-lg">'+
                '<input type="text" id="" name="h_day[]" class="form-control form-control-lg font-weight-bold dark-grey-text" value="'+$num_day+'" placeholder="Day">'+

                '</div>'+
                '</div>'+
                '<div class="col">'+
                '<div class="md-form form-lg">'+
                '<input type="text" id="" name="h_title[]" class="form-control form-control-lg font-weight-bold orange-text" value="" placeholder="Title">'+

                '</div>'+
                '</div>'+
                '<div class="col-12">'+
                '<div class="md-form mt-0">'+
                '<textarea id="" name="h_resumen[]" class="" rows="2"></textarea>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<div class="col-auto field_itinerary">'+
                '<a href="javascript:void(0);" class="remove_button col-auto" title="Remove field"> <i class="fas fa-times text-danger"></i></a>'+
                '</div>'+
                '<script>'+
                '$( ".autocomplete_itinerary" ).autocomplete({'+
                'source: "{{route('autocomplete_itinerary_path')}}",'+
                '});'+
                '<'+
                '/'+
                'script>'+
                '<script>'+

                'tinymce.init({'+
                'selector: "textarea",'+
                'height: 280,'+
                'menubar: false,'+
                'browser_spellcheck : true,'+
                'contextmenu: false,'+
                'plugins: ['+
                '"advlist autolink lists link image charmap print preview anchor textcolor",'+
                '"searchreplace visualblocks code fullscreen",'+
                '"insertdatetime media table paste code help wordcount"'+
                '],'+
                'toolbar: "undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help",'+
                'setup: function (editor) {'+
                'editor.on("change", function () {'+
                'editor.save();'+
                '});'+
                '}'+
                '});'+
                '<'+
                '/'+
                'script>'+
                '</div>';

            var x = 1; //Initial field counter is 1

            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper2).append(fieldHTML); // Add field html
                }
            });

            $(addButtonIncluded).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper_included2).append(fieldHTMLIncluded); // Add field html
                }
            });

            $(addButtonNoIncluded).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper_no_included2).append(fieldHTMLNoIncluded); // Add field html
                }
            });

            $(addButtonItinerary).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper_itinerary2).append(fieldHTMLItinerary); // Add field html
                }
            });

            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
            $(wrapper2).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });

            $(wrapper_included).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
            $(wrapper_included2).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });

            $(wrapper_no_included).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
            $(wrapper_no_included2).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });



            $(wrapper_itinerary).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
            $(wrapper_itinerary2).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });



            $( "#q" ).autocomplete({
                source: "{{route('autocomplete_path')}}",
                // minLength: 2,
                select: function(event, ui) {
                    // $this.val(ui.item.value);
                    // $('#q2').val(ui.item.value);
                    var res = ui.item.id;
                    document.getElementById("q2").value = res;
                }

            });

            {{--$( "#q" ).autocomplete({--}}
                {{--source: "{{route('autocomplete_path')}}",--}}
                {{--// minLength: 2,--}}
                {{--select: function(event, ui) {--}}
                    {{--// $this.val(ui.item.value);--}}
                    {{--// $('#q2').val(ui.item.value);--}}
                    {{--var res = ui.item.id;--}}
                    {{--document.getElementById("q2").value = res;--}}
                {{--}--}}

            {{--});--}}

            $( ".autocomplete_destinos" ).autocomplete({
                source: "{{route('autocomplete_path')}}",
            });

            $( ".autocomplete_included" ).autocomplete({
                source: "{{route('autocomplete_included_path')}}",
            });

            $( ".autocomplete_no_included" ).autocomplete({
                source: "{{route('autocomplete_no_included_path')}}",
            });

        });

    </script>
@endpush
