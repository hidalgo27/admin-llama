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
                    <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="90%">
                        <tbody>
                        <tr bgcolor="#ffffff">
                            <td valign="top" style="padding:10px 35px 0 35px;color:#ffffff">
                                <img class="CToWUd" width="350" alt="logo llama tours" src="http://llama.tours/images/logo-llama.png" style="vertical-align:top;max-width:220px">
                            </td>

                        </tr>

                        <tr>
                            <td style="padding:20px 0px 20px 50px">
                                <p style="font-size:18px"><b>Estimado(a) </b>: {{$name}}</p>
                                <p>@php echo $messagess @endphp</p>
                                <p style="font-weight: bold; font-size: 18px">PAQUETE: GTP500 Peru Fascinante</p>
                                <center style="background:#f6f6f6; padding:10px;">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td style="text-align:left">
                                                @php
                                                    $day = explode('*', $day);
                                                    $title = explode('*', $title);
                                                    $resumen = explode('*', $resumen);
                                                @endphp
                                                @foreach($day as $days)

                                                            <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia {{$days}}: Titulo</p>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur cumque dolore ducimus enim excepturi exercitationem natus. Aliquam deleniti doloremque dolorum eaque eligendi facilis libero minima, nulla possimus quis, soluta voluptatum.</p>
{{--                                                            @php echo $resumen; @endphp--}}

                                                @endforeach
                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia 1: Titulo del paquete</p>--}}
                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae culpa distinctio, enim fuga harum inventore ipsum, iste minima natus nobis pariatur, quia quo quos reiciendis similique totam veritatis voluptatibus?</p>--}}
                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia 1: Titulo del paquete</p>--}}
                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae culpa distinctio, enim fuga harum inventore ipsum, iste minima natus nobis pariatur, quia quo quos reiciendis similique totam veritatis voluptatibus?</p>--}}
                                                {{--<p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Dia 1: Titulo del paquete</p>--}}
                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur beatae culpa distinctio, enim fuga harum inventore ipsum, iste minima natus nobis pariatur, quia quo quos reiciendis similique totam veritatis voluptatibus?</p>--}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>

                                <center style="margin-top: 30px; width: 100%">
                                    <p style="font-weight: bold; font-size: 18px; text-align: left">PRECIOS</p>
                                    <table style="width: 100%">
                                        <tbody>
                                        <tr style="text-align: center;">
                                            <td style="text-align:center">
                                                <table style="text-align: center; width: 100%; background:#f6f6f6;">
                                                    <tr style="text-align: center">
                                                        <td style="font-size: 20px; font-weight: bold;">Con Hoteles</td>
                                                    </tr>
                                                    <tr style="text-align: center">
                                                        <td style="font-weight: bold; font-size: 25px">${{$precio_ch}}usd</td>
                                                    </tr>
                                                    <tr style="text-align: center">
                                                        <td>Price per person.</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="text-align:center">
                                                <table style="text-align: center; width: 100%; background:#f6f6f6;">
                                                    <tr style="text-align: center">
                                                        <td style="font-size: 20px; font-weight: bold;">Sin Hoteles</td>
                                                    </tr>
                                                    <tr style="text-align: center">
                                                        <td style="font-weight: bold; font-size: 25px">${{$precio_sh}}usd</td>
                                                    </tr>
                                                    <tr style="text-align: center">
                                                        <td>Price per person.</td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px; background: #8d8d8d; color: white; border-radius: 0 0 5px" colspan="2">* Si desea puede reservar las actividades por separado</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>
                                <hr>
                                <center style="margin-top: 0px; width: 100%">
                                    <table style="width: 100%; border: 1px solid #cccccc;">
                                        <thead>
                                        <tr style="background: #0d0d0d; color: white; text-align: center">
                                            <th>Economic</th>
                                            <th>Tourist</th>
                                            <th>Superior</th>
                                            <th>Luxury</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr style="text-align: center;">
                                            <td style="font-weight: bold; color: #181818">${{$precio_2}}usd</td>
                                            <td style="font-weight: bold; color: #181818">{{$precio_3}}usd</td>
                                            <td style="font-weight: bold; color: #181818">${{$precio_4}}usd</td>
                                            <td style="font-weight: bold; color: #181818">${{$precio_5}}usd</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <p style="text-align: left">***Precios basados en doble acomodación</p>
                                </center>

                                <center style="background:#f6f6f6; padding:10px;">
                                    <table style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="text-align:left">
                                                <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">Incluye:</p>
                                                <ul>
                                                    @php
                                                        $included = explode('*', $incluye);
                                                    @endphp
                                                    @foreach($included as $includes)
                                                        <li>{{$includes}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td style="text-align:left">
                                                <p style="font-weight: bold; font-size: 16px; color: #ff9800 ">No Incluye:</p>
                                                <ul>
                                                    @php
                                                        $noincluded = explode('*', $noincluye);
                                                    @endphp
                                                    @foreach($noincluded as $noincludeds)
                                                        <li>{{$noincludeds}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </center>

                                <hr>
                                <center style="margin-top: 0px; width: 100%">
                                    <p style="font-weight: bold; font-size: 16px; color: #181818; text-align: left ">UPGRADES OPCIONALES</p>
                                    <table style="width: 100%;">
                                        <tr style="text-align: left;">
                                            <td style="font-weight: bold; color: #181818">
                                                <ul>
                                                    @php
                                                        $otros = explode('*', $otros);
                                                    @endphp
                                                    @foreach($otros as $otro)
                                                        <li>{{$otro}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                                <hr style="margin: 40px">
                                <center style="margin-top: 0px; width: 100%">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td style="text-align:center;font-size:12px;padding:5px 15px;color:#999999">
                                                <p>
                                                    Visite Perú, tierra de los incas
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