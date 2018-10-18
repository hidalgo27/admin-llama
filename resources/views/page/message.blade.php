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

                <ul class="unstyled inbox-pagination mb-0">
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
        <div class="row my-3">
            <div class="col">
                @foreach($inquire as $inquires)
                @endforeach
                    @foreach($package->where('id', $inquires->id_paquetes) as $packages)
                        <h3 class="font-weight-bold">{{$packages->codigo}}: {{$packages->titulo}} X{{$inquires->traveller}}</h3>
                    @endforeach
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="card">
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
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @foreach($itinerary as $itin)
                        <div class="row mt-4">
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
                                    <textarea type="text" id="h_resumen" name="h_resumen[]" class="md-textarea md-textarea-auto form-control py-2 editor-{{$itin->id}}" rows="2">@php echo $itin->resumen @endphp</textarea>
                                    {{--<label for="text2">Auto-resizing textarea</label>--}}
                                </div>
                            </div>
                        </div>
                            @push('scripts')
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '.editor-{{$itin->id}}' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
                            @endpush
                            @endforeach
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
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="destinos_{{$paquete_destinos->id}}" name="destinations[]" value="{{$paquete_destinos->destinos->nombre}}" checked>
                                        <label class="custom-control-label" for="destinos_{{$paquete_destinos->id}}">{{ucwords(strtolower($paquete_destinos->destinos->nombre))}}</label>
                                    </div>
                                @endforeach
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
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="incluye_{{$incluidos->id}}" name="incluye[]" value="{{$incluidos->incluye}}" checked>
                                        <label class="custom-control-label" for="incluye_{{$incluidos->id}}">{{$incluidos->incluye}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12 mt-3">
                                <h5 class="font-weight-bold orange-text">Not Included</h5>
                                @foreach($no_incluye as $no_incluidos)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="no_incluye_{{$no_incluidos->id}}" name="noincluye[]" value="{{$no_incluidos->noincluye}}" checked>
                                        <label class="custom-control-label" for="no_incluye_{{$no_incluidos->id}}">{{$no_incluidos->noincluye}}</label>
                                    </div>
                                @endforeach
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold orange-text">Travel Advisor Message</h5>
                        <div class="row">
                            <div class="col-2">
                                <b>to:</b>
                            </div>
                            <div class="col">
                                hidalgo@gmail.com
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <b>from:</b>
                            </div>
                            <div class="col">
                                karina@llama.tours
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
                <a href="" class="btn btn-light float-left">Save Mail <i class="fa fa-save"></i></a>
                {{--<a href="" class="btn btn-primary float-right" onclick="design()">Send Mail</a>--}}
                <button type="button" class="btn btn-primary float-right" id="h_submit" onclick="message()">Submit</button>
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

    </form>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '.editor-mess' ) )
            .catch( error => {
                console.error( error );
            } );

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
            s_day = $day.substring(0,$day.length-3);

            var s_title = document.getElementsByName('h_title[]');
            var $title = "";
            for (var i = 0, l = s_title.length; i < l; i++) {
                if (s_title[i].valueOf()) {
                    $title += s_title[i].value+'*';
                }
            }
            s_title = $title.substring(0,$title.length-3);

            var s_resumen = document.getElementsByName('h_resumen[]');
            var $resumen = "";
            for (var i = 0, l = s_resumen.length; i < l; i++) {
                if (s_resumen[i].valueOf()) {
                    $resumen += s_resumen[i].value+'*';
                }
            }
            s_resumen = $resumen.substring(0,$resumen.length-3);


            var s_destinations = document.getElementsByName('destinations[]');
            var $destinations = "";
            for (var i = 0, l = s_destinations.length; i < l; i++) {
                if (s_destinations[i].checked) {
                    $destinations += s_destinations[i].value+'*';
                }
            }
            s_destinations = $destinations.substring(0,$destinations.length-3);

            var s_incluye = document.getElementsByName('incluye[]');
            var $incluye = "";
            for (var i = 0, l = s_incluye.length; i < l; i++) {
                if (s_incluye[i].checked) {
                    $incluye += s_incluye[i].value+'*';
                }
            }
            s_incluye = $incluye.substring(0,$incluye.length-3);

            var s_noincluye = document.getElementsByName('noincluye[]');
            var $noincluye = "";
            for (var i = 0, l = s_noincluye.length; i < l; i++) {
                if (s_noincluye[i].checked) {
                    $noincluye += s_noincluye[i].value+'*';
                }
            }
            s_noincluye = $noincluye.substring(0,$noincluye.length-3);

            var s_otros = document.getElementsByName('otros[]');
            var $otros = "";
            for (var i = 0, l = s_otros.length; i < l; i++) {
                if (s_otros[i].checked) {
                    $otros += s_otros[i].value+'*';
                }
            }
            s_otros = $otros.substring(0,$otros.length-3);


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

            var s_message = $("#h_message").val();

            // var s_number = $(".number:checked").val();
            // var s_number_t = $("#h_number").val();
            // var s_duration = $(".duration:checked").val();
            // var s_duration_t = $("#h_duration").val();
            // var s_date = $('#h_date').val();
            // var s_tel = $('#h_tel').val();
            // var s_name = $('#h_name').val();
            // var s_email = $('#h_email').val();
            // var s_comment = $('#h_comment').val();

            {{--var s_countryData = $("#h_tel").intlTelInput("getSelectedCountryData").name;--}}
            {{--var s_codeData = $("#h_tel").intlTelInput("getNumber");--}}


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
    </script>
@endpush