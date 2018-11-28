<table style="font-family:Lato,sans-serif;font-size:15px;color:#666666;width: 100%;" marginheight="0" marginwidth="0">
    <table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" width="100%" color="#666666">
        <tr>
            <td>
                <a target="_blank" href="http://llama.tours/">
                    <img src="http://llama.tours/images/logo-llama.png" data-holder-rendered="true" width="300">
                </a>
            </td>
            <td style="text-align: right;">
                <h2 style="font-size: 35px; color: #4285f4 ;">
                    <a target="_blank" href="http://llama.tours/">
                        LlamaTours
                    </a>
                </h2>
                <p style="margin: 0; padding: 0;"> Av. Sol 948, Oficina 315, Cusco - Cusco</p>
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
                <h2 style="font-size: 30px;">{{$name}}</h2>
                {{--<div class="address">796 Silver Harbour, TX 79273, US</div>--}}
                <div class="email"><a href="mailto:{{$email}}">{{$email}}</a></div>
            </td>
            <td style="text-align: right;">
                <h1 class="invoice-id">INVOICE
                    @foreach($payment_l->where('estado', 1) as $payment_ls)
                        - {{$payment_ls->id}}
                    @endforeach
                </h1>
                @php
                    date_default_timezone_set('America/Lima');
                    $date_d = strftime("%d %b %Y",strtotime(date("Y-m-d")));
                    $date_a = date("Y-m-d");
                @endphp
                <div class="date">Date of Invoice: {{$date_a}}</div>
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
        @php $total = 0; @endphp
        @foreach($payment_l->where('estado', 1) as $payment_l2)
        <tr style="padding: 15px; background: #eee;">
            <td style="color: #fff; font-size: 25px; background: #ff9200; padding: 15px; text-align: center;">01</td>
            <td style="text-align: left; padding: 15px;">
                <h3>{{$payment_l2->concepto}}</h3>
                {{--Creating a recognizable design solution based on the company's existing visual identity--}}
            </td>
            @php
                date_default_timezone_set('America/Lima');
                $date_d = strftime("%d %b %Y",strtotime($date));
                $date_f = date("Y-m-d");
            @endphp
            <td style="text-align: center;">{{$date_f}}</td>
            <td style="color: #fff; font-size: 25px; background: #ff9200; padding: 15px; text-align: right;">${{$payment_l2->a_cuenta}}</td>
        </tr>
            @php $total = $total + $payment_l2->a_cuenta; @endphp
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td style="font-size: 18px; padding: 15px; text-align: right;">SUBTOTAL</td>
            <td style="font-size: 25px; padding: 15px; text-align: right; border-bottom: 1px solid #000;">${{$total}}</td>
        </tr>
        {{--<tr>--}}
        {{--<td colspan="1"></td>--}}
        {{--<td colspan="3">PENDING</td>--}}
        {{--<td>$100.00</td>--}}
        {{--</tr>--}}
        <tr>
            <td colspan="2" style="font-size: 30px; font-weight: bold; color: #4285f4 ;">Thank you!</td>
            <td style="font-size: 18px; padding: 15px; text-align: right; color: #4285f4 ;">GRAND TOTAL</td>
            <td style="font-size: 18px; padding: 15px; text-align: right; color: #4285f4 ;">${{$total}}</td>
        </tr>
        </tfoot>
    </table>
    {{--<div class="thanks">Thank you!</div>--}}

    <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%;" marginheight="0" marginwidth="0">
        <tbody>
        <tr>
            <td>
                <p style="margin: 0; padding: 0;"><b style="font-weight: bold;">Price per person:</b> {{$total_sales}}/{{$traveller}} = ${{round($total_sales/$traveller, 2)}}</p>
                @if ($total < $total_sales)
                    <p style="margin: 0; padding: 0;"><strong style="font-weight: bold; color: red;">Outstanding: ${{$total_sales - $total}}</strong></p>
                @endif


                @foreach($payment_l->where('estado', 0) as $payment_se)
                    @php
                        date_default_timezone_set('America/Lima');
                        $date_ap = strftime("%d %b %Y",strtotime($payment_se->fecha_a_pagar));
                    @endphp

                    <p style="margin: 0; padding: 0; font-weight: bold;"><span style="background: yellow; padding: 5px; border-radius: 5px;" class="yellow p-1 rounded">Next Payment Date: {{$date_ap}}</span></p>
                @endforeach

            </td>
        </tr>
        </tbody>
    </table>

    <table style="font-family:Lato,sans-serif;font-size:15px;color:#666666; width: 100%; margin-top: 30px;" marginheight="0" marginwidth="0">
        <caption>Means of payment</caption>
        <tbody>
        @foreach($payment_l->where('estado', 1) as $payment_s)
        <tr style="padding: 15px; background: #eee;">
            <td style="padding: 15px;">1</td>
            <td>{{$payment_s->medio}}</td>
            <td style="text-align: center">{{$payment_s->transaccion}}</td>
            <td style="padding: 15px; text-align: right;">{{$payment_s->created_at}}</td>
        </tr>
        @endforeach
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
