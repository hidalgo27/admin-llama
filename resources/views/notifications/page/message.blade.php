{{--<p>{{$idinquire}}</p>--}}
{{--<p>{{$sp_package}}</p>--}}
{{--<p>{{$email_cliente}}</p>--}}
{{--<p>{{$name_cliente}}</p>--}}
{{--<p>{{$travellers}}</p>--}}
{{--<p>{{$category}}</p>--}}
{{--<p>{{$travel_date}}</p>--}}
{{--<p>{{$duration}}</p>--}}
{{--<p>{{$phone}}</p>--}}
{{--<p>{{$destinations_i}}</p>--}}
{{--<p>--}}
    {{--@foreach($day as $days)--}}
        {{--{{$days}}--}}
    {{--@endforeach--}}
{{--</p>--}}
{{--<p>--}}
    {{--@foreach($title as $titles)--}}
        {{--{{$titles}}--}}
    {{--@endforeach--}}
{{--</p>--}}
{{--<p>--}}
    {{--@foreach($resumen as $resumens)--}}
        {{--{{$resumens}}--}}
    {{--@endforeach--}}
{{--</p>--}}
{{--<p>--}}
    {{--@foreach($destinations as $destination)--}}
        {{--{{$destination}}--}}
    {{--@endforeach--}}
{{--</p>--}}
{{--<p>--}}
    {{--@foreach($incluye as $incluyes)--}}
        {{--{{$incluyes}}--}}
    {{--@endforeach--}}
{{--</p>--}}
{{--<p>--}}
    {{--@foreach($noincluye as $noincluyes)--}}
        {{--{{$noincluyes}}--}}
    {{--@endforeach--}}
{{--</p>--}}


{{--<p>{{$precio_ch}}</p>--}}
{{--<p>{{$precio_sh}}</p>--}}

{{--<p>{{$precio_2}}</p>--}}
{{--<p>{{$precio_3}}</p>--}}
{{--<p>{{$precio_4}}</p>--}}
{{--<p>{{$precio_5}}</p>--}}


{{--<p>{{$economic}}</p>--}}
{{--<p>{{$tourist}}</p>--}}
{{--<p>{{$superior}}</p>--}}
{{--<p>{{$luxury}}</p>--}}

{{--<p>{{$otros}}</p>--}}

{{--<p>--}}
    {{--@foreach($tratamiento as $tratamientos)--}}
        {{--{{$tratamientos}}--}}
    {{--@endforeach--}}
{{--</p>--}}

{{--<p>{{$presentation}}</p>--}}
{{--<p>{{$farewell}}</p>--}}
{{--<p>{{$email_a}}</p>--}}
{{--<p>{{$name_a}}</p>--}}
{{--<p>{{$codigo_p}}</p>--}}
{{--<p>{{$titulo_p}}</p>--}}
{{--@extends('layouts.notifications.default')--}}
{{--@section('content')--}}
    {{--<tr>--}}
        {{--<td style="padding:20px 0px 20px 50px">--}}
            {{--<p style="font-size:18px"><b>Mensaje de</b>: {{$name}}</p>--}}
            {{--<p>Mensaje del formulario de contact.</p>--}}
            {{--<center style="background:#f6f6f6; padding:10px;">--}}
                {{--<table>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<td style="text-align:left">--}}
                            {{--<p><strong>day: {{$day}}</strong></p>--}}
                            {{--<p><strong>Title: {{$title}}</strong></p>--}}
                            {{--<p><strong>Resumen: @php echo $resumen @endphp</strong></p>--}}
                            {{--<p><strong>Destinations: {{$destinations}}</strong></p>--}}
                            {{--<p><strong>Incluye: {{$incluye}}</strong></p>--}}
                            {{--<p><strong>No incluye: {{$noincluye}}</strong></p>--}}
                            {{--<p><strong>Email: {{$email}}</strong></p>--}}
                            {{--<p><strong>Name: {{$name}}</strong></p>--}}
                            {{--<p><strong>Category: {{$category}}</strong></p>--}}
                            {{--<p><strong>Date: {{$date}}</strong></p>--}}
                            {{--<p><strong>Phone: {{$phone}}</strong></p>--}}
                            {{--<p><strong>Precio_ch: {{$precio_ch}}</strong></p>--}}
                            {{--<p><strong>Precio_sh: {{$precio_sh}}</strong></p>--}}
                            {{--<p><strong>Precio_2: {{$precio_2}}</strong></p>--}}
                            {{--<p><strong>Precio_3: {{$precio_3}}</strong></p>--}}
                            {{--<p><strong>Precio_4: {{$precio_4}}</strong></p>--}}
                            {{--<p><strong>Precio_5: {{$precio_5}}</strong></p>--}}
                            {{--<p><strong>Otros: {{$otros}}</strong></p>--}}
                            {{--<p><strong>Message: {{$messagess}}</strong></p>--}}

                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</center>--}}
        {{--</td>--}}
    {{--</tr>--}}
{{--@stop--}}
<div class="container">
    <div style="font-family:Lato,sans-serif;font-size:15px;color:#666666" marginheight="0" marginwidth="0">
        <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="100%" color="#666666">
            <tbody>
            <tr>
                <td bgcolor="#ffffff" width="100%" valign="top">
                    <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="100%">
                        <tbody>
                        <tr bgcolor="#ffffff">
                            <td valign="top" style="padding:10px 35px 0 35px;color:#ffffff">
                                <img class="CToWUd" width="350" alt="logo llama tours" src="http://llama.tours/images/logo-llama.png" style="vertical-align:top;max-width:220px">
                            </td>

                        </tr>

                        <tr>
                            <td style="padding:20px 0px 20px 50px">
                                <p style="font-size:18px">
                                    <b>
                                        @foreach($tratamiento as $tratamientos)
                                            Estimad{{$tratamientos}}
                                        @endforeach
                                    </b>: {{ucwords(strtolower($name_cliente))}}</p>
                                <p>@php echo $presentation @endphp</p>
                                <p style="font-weight: bold; font-size: 18px">PAQUETE: {{$codigo_p}} {{$titulo_p}}</p>
                                <center style="background:#f6f6f6; padding:10px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);border: 0;">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td style="text-align:left">
                                                @php
                                                    //$day = explode('*', $day);
                                                    //$title = explode('*', $title);
                                                    //$resumen = explode('*', $resumen);
                                                    //$count  = count($day);
                                                    $i = 0;
                                                @endphp
                                                {{--@for ($i = 0; $i < $count; $i++)--}}
                                                    {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia {{$day[$i]}}: {{$title[$i]}}</p>--}}
                                                    {{--@php echo $resumen[$i]; @endphp--}}
                                                {{--@endfor--}}

                                                @foreach($title as $titles)
                                                    <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia {{$i+1}}: {{$titles}}</p>
                                                    @php
                                                        echo $resumen[$i];
                                                        $i++;
                                                    @endphp
                                                @endforeach

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>

                                <center style="margin-top: 30px; width: 100%">
                                    <p style="font-weight: bold; font-size: 18px; text-align: left; margin: 0; color: #ff9800;">PRECIOS DEL PROGRAMA DE {{$i}} DIAS</p>
                                    <p style="text-align: left"><strong style="font-weight: bold;">Precio por persona USD$.</strong> <span style="font-style: italic;">(basados en doble acomodación.)</span></p>

                                </center>

                                {{--<center style="margin-top: 30px; width: 100%">--}}
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
                                            {{--<td style="font-weight: bold; color: #181818">${{$precio_2}}usd</td>--}}
                                            {{--<td style="font-weight: bold; color: #181818">{{$precio_3}}usd</td>--}}
                                            {{--<td style="font-weight: bold; color: #181818">${{$precio_4}}usd</td>--}}
                                            {{--<td style="font-weight: bold; color: #181818">${{$precio_5}}usd</td>--}}
                                        {{--</tr>--}}

                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--<p style="text-align: left; font-weight: bold;">***Precios basados en doble acomodación.</p>--}}
                                {{--</center>--}}

                                {{--@php--}}

                                    {{--if ($economic == 'economic'){--}}
                                        {{--$d_economic = "display: none;";--}}
                                    {{--}else{--}}
                                        {{--$d_economic = '';--}}
                                    {{--}--}}

                                    {{--if ($tourist == 'tourist'){--}}
                                        {{--$d_tourist = "display: none;";--}}
                                    {{--}else{--}}
                                        {{--$d_tourist = '';--}}
                                    {{--}--}}

                                    {{--if ($superior == 'superior'){--}}
                                        {{--$d_superior = "display: none;";--}}
                                    {{--}else{--}}
                                        {{--$d_superior = '';--}}
                                    {{--}--}}

                                    {{--if ($luxury = 'luxury'){--}}
                                        {{--$d_luxury = "display: none;";--}}
                                    {{--}else{--}}
                                        {{--$d_luxury = '';--}}
                                    {{--}--}}

                                {{--@endphp--}}

                                <center style="margin-top: 10px; width: 100%">
                                    <h5 style="font-size: 18px; margin-bottom: 10px;">Hoteles, Tours, Transporte, Entradas, Trenes, Transfers.</h5>
                                    <table style="width: 100%; border: 1px solid #cccccc;">
                                        <thead>
                                        <tr style="background: #8d8d8d; color: white; text-align: center">

                                            @php
                                            if ($economic == 'economic'){
                                            $econo = " ";
                                            }else{
                                            $econo = "display:none;";
                                            }
                                            if ($tourist == 'tourist'){
                                            $tour = " ";
                                            }else{
                                            $tour = "display:none;";
                                            }
                                            if ($superior == 'superior'){
                                            $sup = " ";
                                            }else{
                                            $sup = "display:none;";
                                            }
                                            if ($luxury == 'luxury'){
                                            $lux = " ";
                                            }else{
                                            $lux = "display:none;";
                                            }
                                            @endphp
                                            <th style="padding: 10px; {{$econo}}">Económico</th>
                                            <th style="{{$tour}}">Turista</th>
                                            <th style="{{$sup}}">Superior</th>
                                            <th style="{{$lux}}">Lujo</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr style="text-align: center;">
                                            <td style="font-weight: bold; color: #181818; {{$econo}}">${{$precio_2}}usd</td>
                                            <td style="font-weight: bold; color: #181818; {{$tour}}">${{$precio_3}}usd</td>
                                            <td style="font-weight: bold; color: #181818; {{$sup}}">${{$precio_4}}usd</td>
                                            <td style="font-weight: bold; color: #181818; {{$lux}}">${{$precio_5}}usd</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <p style="text-align: left; font-weight: bold;">***Precios basados en doble acomodación.</p>
                                </center>

                                <center style="margin-top: 30px; width: 100%">
                                    <h5 style="font-size: 18px; margin-bottom: 10px;">Tours, Transporte, Entradas, Trenes, Transfers.</h5>
                                    <table style="width: 100%; border: 1px solid #cccccc;">
                                        <tbody>
                                        <tr style="background: #ff9800; color: white; text-align: center">
                                            <th style="padding: 10px; font-size: 18px">{{$i}} días <span style="color: #0d0d0d; font-weight: bold;">SIN HOTELES: ${{$precio_sh}}usd</span></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p style="text-align: left; font-weight: bold;">***Precios basados en doble acomodación.</p>
                                </center>


                                <center style="margin-top: 30px; width: 100%">
                                    <table style="width: 100%">
                                        <tbody>
                                        <tr style="text-align: center;">
                                            <td style="text-align:center; width: 60%">
                                                <img src="{{asset('http://admin.llama.tours/images/cuotas.jpg')}}" alt="" style="width: 100%">
                                            </td>
                                            <td style="text-align:left; width: 50%">
                                                <h5 style="font-weight: bold; font-size: 18px; margin-bottom: 5px;">Facilidades de Pago hasta 6 cuotas.</h5>
                                                <p style="font-size: 16px; margin: 0;">Ejemplo: ${{$precio_sh}}/6 = ${{round($precio_ch/6, 2)}} pagos mensuales.</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>

                                <center style="background:#f6f6f6; margin: 40px 0; padding:10px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);border: 0;">
                                    <table style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="text-align:left; float: left; width: 50%">
                                                <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Incluye:</p>
                                                <ul>
                                                    @foreach($incluye as $incluyes)
                                                        <li>{{$incluyes}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td style="text-align:left; float: left; width: 100%">
                                                <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">No Incluye:</p>
                                                <ul>
                                                    @foreach($noincluye as $noincluyes)
                                                        <li>{{$noincluyes}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>

                                <hr style="margin: 40px 0">
                                {{--<center style="margin-top: 0px; width: 100%">--}}
                                    {{--<p style="font-weight: bold; font-size: 16px; color: #181818; text-align: left ">UPGRADES OPCIONALES</p>--}}
                                    {{--<table style="width: 100%;">--}}
                                        {{--<tr style="text-align: left;">--}}
                                            {{--<td style="font-weight: bold; color: #181818">--}}
                                                {{--<ul>--}}
                                                    {{--@php--}}
                                                        {{--$otros = explode('*', $otros);--}}
                                                    {{--@endphp--}}
                                                    {{--@foreach($otros as $otro)--}}
                                                        {{--<li>{{$otro}}</li>--}}
                                                    {{--@endforeach--}}
                                                {{--</ul>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--</table>--}}
                                {{--</center>--}}
                                <center style="margin-top: 0px; width: 100%">
                                    <p style="font-weight: bold; font-size: 18px; color: #4b4b4b; text-align: left; margin: 0; ">También ofrecemos</p>
                                    <p style="font-size: 16px; color: #4b4b4b; text-align: left;margin: 0; ">Solo tours a la carta.</p>
                                    <table style="width: 100%;">
                                        <tr style="text-align: left;">
                                            <td style="font-weight: bold; color: #181818">
                                                <ul>
                                                sdsdsd
                                                </ul>
                                                <ul>
                                                    <li><a href="http://llama.tours/peru-tours/machu-picchu-todo-el-dia" target="_blank">Machu Picchu todo el día: $229usd</a></li>
                                                    <li><a href="http://llama.tours/peru-tours/city-tour-en-cusco" target="_blank">City tours en Cusco: $19usd</a></li>
                                                    <li><a href="http://llama.tours/peru-tours/tour-valle-sagrado-de-los-incas" target="_blank">Tour Valle Sagrado de los incas: $21usd</a></li>
                                                    <li><a href="http://llama.tours/peru-tours/tour-montaÑa-de-7-colores" target="_blank">Tour Montaña de 7 colores: $45usd</a></li>
                                                    <li><a href="http://llama.tours/peru-tours/tour-lago-titicaca" target="_blank">Tour Lago Titicaca: $229usd</a></li>
                                                </ul>
                                                <span><a href="http://llama.tours/peru-tours" target="_blank">Ver más ...</a></span>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                                <hr style="margin: 40px 0">
                                <center style="background:#d6e9f8; padding:10px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);border: 0;">
                                    <table style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="text-align:left;">
                                                <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">***</p>
                                                 @php echo $farewell @endphp
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>
                                <hr style="margin: 40px 0">
                                <center style="background:#f6f6f6; padding:10px;">
                                    <table style="width: 40%">
                                        <tbody>
                                        <tr>
                                            <td style="text-align:center; float: left; width: 30%">
                                                <img src="http://admin.llama.tours/images/{{$email_a}}.jpg" alt="" style="width: 100%">
                                                <p style="font-size: 10px; text-align: center; margin: 0">TA. {{$name_a}}</p>
                                                <a href=""><img src="http://admin.llama.tours/images/redes/whatsapp.png" alt="logo whatsapp" style="width: 20px;"></a>
                                                <a href=""><img src="http://admin.llama.tours/images/redes/facebook.png" alt="logo facebook" style="width: 20px;"></a>
                                                <a href=""><img src="http://admin.llama.tours/images/redes/instagram.png" alt="logo instagram" style="width: 20px;"></a>
                                            </td>
                                            <td style="text-align:left; float: left; padding-left: 20px; width: 60%;">
                                                <table style="width: 100%">
                                                    <tr>
                                                        <td style="width: 15%">
                                                            <img src="http://admin.llama.tours/images/logo-llama2.png" alt="" style="width: 100%">
                                                        </td>
                                                        <td style="width: 85%; padding-left: 10px;">
                                                            <p style="font-weight: bold; font-size: 18px; color: #ff9800; margin: 0;">{{$name_a}}</p>
                                                            <p style="font-size: 12px;">Travel Advisor</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><hr></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone:</td>
                                                        <td>+51 84 206 931</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Site:</td>
                                                        <td><a href="llama.tours">llama.tours</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td><a href="mailto:karina@llama.tours">{{$email_a}}</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>
                                <hr style="margin: 40px 0">
                                <center style="margin-top: 0px; width: 100%">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td style="text-align:center;font-size:12px;padding:5px 15px;color:#999999">
                                                <p>
                                                    Visite Perú, tierra de los Incas.
                                                </p>
                                                <img class="CToWUd" width="250" alt="logo llama tours" src="http://llama.tours/images/logo-llama.png" style="vertical-align:top;max-width:220px">
                                            </td>
                                        </tr>
                                    </table>
                                </center>

                            </td>
                        </tr>


                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
