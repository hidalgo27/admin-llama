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
                <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" onClick="location.reload();"  class="btn mini tooltips">
                    <i class="fas fa-redo-alt"></i>
                </a>
            </div>
            <div class="btn-group">
                <a id="d_mailbtn" data-placement="top" class="btn mini tooltips d-none" onclick="chk_restore()">
                    {{--<i class="fa fa-trash" id="d_trash"></i>--}}
                    <i class="fas fa-archive" id="d_trash"></i>
                    <i class="fas fa-spinner fa-pulse d-none" id="d_spinner"></i>
                    {{--<i class="fas fa-archive"></i>--}}
                </a>
                {{--<button type="button" class="btn mini tooltips d-none" id="d_mailbtn" onclick="chk_trash()">--}}
                {{--<i class="fa fa-trash" id="d_trash"></i>--}}
                {{--<i class="fas fa-spinner fa-pulse d-none" id="d_spinner"></i>--}}
                {{--</button>--}}
            </div>
            <div class="btn-group">
                <a href="#"  class="btn mini tooltips btn-primary" data-toggle="modal" data-target="#new_payment">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            {{--<div class="btn-group">--}}
            {{--<a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">--}}
            {{--<i class=" fa fa-trash"></i>--}}
            {{--</a>--}}
            {{--</div>--}}

            {{--<ul class="list-unstyled inbox-pagination mb-0">--}}
            {{--<li><span>1-50 of 234</span></li>--}}
            {{--<li>--}}
            {{--<a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>--}}
            {{--</li>--}}
            {{--</ul>--}}

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="new_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 grey-text font-weight-bold">NEW PAYMENT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('save_compose_payment_path')}}" role="form" method="post">
                {{csrf_field()}}
                <div class="modal-body mx-3">
                    <div class="row my-3 align-items-center">
                        <div class="col">
                            <select class="selectpicker w-100" data-live-search="true" id="a_package" name="id_package">
                                @foreach($package as $pack)
                                    <option data-tokens="ketchup mustard" value="{{$pack->id}}">{{$pack->codigo}}: {{$pack->titulo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row pt-4">
                        <div class="col">
                            <div class="md-form mb-5">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input placeholder="Full Name" type="text" id="a_name" class="form-control validate" name="txt_name" required>
                                <label data-error="wrong" data-success="right" for="a_name">Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form mb-5">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input placeholder="Email" type="email" id="a_mail" class="form-control validate" name="txt_email" required>
                                <label data-error="wrong" data-success="right" for="a_mail">Your email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="md-form mb-5">
                                <i class="fa fa-users prefix grey-text"></i>
                                <input placeholder="Traveller Number" type="number" id="a_travellers" class="form-control validate" name="txt_travellers" required>
                                <label data-error="wrong" data-success="right" for="a_travellers">Travellers</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form mb-5">
                                <i class="fa fa-calendar prefix grey-text"></i>
                                <input placeholder="Travel Date" type="text" id="t_date_a" class="form-control validate datepicker" name="txt_date" required>
                                <label data-error="wrong" data-success="right" for="t_date_a">Travel Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="md-form mb-5">
                                <i class="fas fa-dollar-sign prefix grey-text active"></i>
                                <input placeholder="Price Sales" type="number"  id="a_travellers" class="form-control validate" name="txt_price" required>
                                <label data-error="wrong" data-success="right" for="a_travellers">Enter the total amount of sale:</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col">
        <form id="h_form" role="form">
            {{csrf_field()}}
            <table id="table_send" class="table table-inbox table-hover mt-3">
                <thead>
                <tr class="bg-light d-none">
                    <th class="th-sm p-0">
                        {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}s
                    </th>
                    {{--<th class="th-sm p-0">--}}
                    {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}{{--d--}}
                    {{--</th>--}}
                    <th class="th-sm p-0 pl-2">Duration
                        <i class="fa fa-sort" aria-hidden="true"></i>
                    </th>
                    {{--<th class="th-sm p-0">--}}

                    {{--</th>--}}

                    {{--<th class="th-sm p-0">--}}
                    {{--</th>--}}
                    <th class="th-sm p-0 text-right pr-2">Date
                        <i class="fa fa-sort" aria-hidden="true"></i>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($inquire->sortByDesc('created_at') as $inquires)
                    @switch($inquires->idusuario)
                        @case(2)
                        @php $badged = "badge-danger"; @endphp
                        @break

                        @case(3)
                        @php $badged = "badge-success"; @endphp
                        @break

                        @case(4)
                        @php $badged = "badge-warning"; @endphp
                        @break

                        @default
                        @php $badged = "badge-dark"; @endphp
                    @endswitch
                    {{--@if($inquires->idusuario == 0)--}}
                    {{--@php $badged = "badge-dark"; @endphp--}}
                    {{--@else--}}
                    {{--@php $badged = "badge-dark"; @endphp--}}
                    {{--@endif--}}

                    @if(Auth::user()->hasRole('admin'))
                        @if ($inquires->id_paquetes == 0 AND $inquires->estado == 4)
                            @php $pay_total = 0; @endphp
                            @foreach($payment->where('idinquires', $inquires->id)->where('estado', 0) as $payments)
                                @php
                                    $pay_total = $pay_total + $payments->a_cuenta
                                @endphp
                            @endforeach
                            @php
                                $porcen =  100 - (($pay_total*100)/$inquires->price);
                            @endphp
                            <tr class='unread'>
                                <td class="inbox-small-cells">
                                    <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox mt-2" onclick="chk_del()">
                                </td>
                                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                                <td class="view-message  dont-show"><a href="{{route('payment_show_path', $inquires->id)}}" class="hover-underline">{{ucwords(strtolower($inquires->name))}} <span class="grey-text d-block small">{{strtolower($inquires->email)}} X {{$inquires->traveller}}</span></a></td>
                                {{--<td class="view-message font-weight-light font-italic">Sin paquete seleccionado</td>--}}
                                {{--<td class="view-message  inbox-small-cells"><span class="grey-text">{{$inquires->city}}</span></td>--}}
                                {{--                        <td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>--}}
                                {{--@php--}}
                                    {{--date_default_timezone_set('America/Lima');--}}
                                    {{--$date_a = date('Y-m-d');--}}
                                    {{--$date_i = $inquires->created_at;--}}
                                    {{--$date_i = strftime('%Y-%m-%d', strtotime($date_i));--}}
                                {{--@endphp--}}
                                {{--@if ($date_a == $date_i)--}}
                                    {{--<td class="view-message  text-right">{{$inquires->time}}</td>--}}
                                {{--@else--}}
                                    {{--<td class="view-message  text-right">{{strftime("%d %b", strtotime(str_replace('-','/', $inquires->created_at)))}}</td>--}}
                                {{--@endif--}}
                                <td>
                                    <a href="{{route('payment_show_path', $inquires->id)}}">
                                        <div class="progress md-progress" style="height: 20px; width: 100%">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{round($porcen, 2)}}%; height: 20px" aria-valuenow="{{round($porcen, 2)}}" aria-valuemin="0" aria-valuemax="100">{{round($porcen, 2)}}%</div>
                                        </div>
                                    </a>
                                </td>
                                {{--<td class="view-message  text-right"><a href="{{route('payment_show_path', $inquires->id)}}" class="text-primary"><i class="fas fa-credit-card"></i> Payment Methods</a></td>--}}
                            </tr>
                        @elseif($inquires->id_paquetes AND $inquires->estado == 4)
                            @php $pay_total = 0; @endphp
                            @foreach($package->where('id', $inquires->id_paquetes)->sortBy('traveldate') as $packages)
                                @foreach($payment->where('idinquires', $inquires->id)->where('estado', 0) as $payments)
                                    @php
                                        $pay_total = $pay_total + $payments->a_cuenta
                                    @endphp
                                @endforeach
                                @php
                                    date_default_timezone_set('America/Lima');
                                    $porcen =  100 - (($pay_total*100)/$inquires->price);

                                    $date_a = date ("Y-m-d");

                                    $fecha = $inquires->traveldate;

                                    $nuevafecha = strtotime ( '-2 day' , strtotime ( $fecha ) ) ;
                                    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

                                    if ($date_a <= $nuevafecha){
                                        $alert = "bg-success";
                                    }else{
                                        $alert = "bg-danger";
                                    }

                                    if ($porcen == 100){
                                        $alert = "bg-success";
                                    }

                                @endphp
                                <tr class='unread'>
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox mt-2" onclick="chk_del()">
                                    </td>
                                    {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                                    <td class="view-message  dont-show"><a href="{{route('payment_show_path', $inquires->id)}}" class="hover-underline">{{ucwords(strtolower($inquires->name))}} <span class="grey-text d-block small">{{strtolower($inquires->email)}} X {{$inquires->traveller}} {{$inquires->traveldate}}</span></a></td>
                                    {{--<td class="view-message ">{{ucwords($packages->codigo)}} | {{$inquires->duration}} days</td>--}}
                                    {{--<td class="view-message  inbox-small-cells"><span class="grey-text">{{$inquires->city}}</span></td>--}}
                                    {{--<td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>--}}
                                    {{--@php--}}
                                        {{--date_default_timezone_set('America/Lima');--}}
                                        {{--$date_a = date('Y-m-d');--}}
                                        {{--$date_i = $inquires->created_at;--}}
                                        {{--$date_i = strftime('%Y-%m-%d', strtotime($date_i));--}}
                                    {{--@endphp--}}
                                    {{--@if ($date_a == $date_i)--}}
                                        {{--<td class="view-message  text-right">{{$inquires->time}}</td>--}}
                                    {{--@else--}}
                                        {{--<td class="view-message  text-right">{{strftime("%d %b", strtotime(str_replace('-','/', $inquires->created_at)))}}</td>--}}
                                    {{--@endif--}}
                                    <td>
                                        <a href="{{route('payment_show_path', $inquires->id)}}">
                                        <div class="progress md-progress mt-2" style="height: 20px; width: 100%">
                                            <div class="progress-bar {{$alert}}" role="progressbar" style="width: {{round($porcen, 2)}}%; height: 20px" aria-valuenow="{{round($porcen, 2)}}" aria-valuemin="0" aria-valuemax="100">{{round($porcen, 2)}}%</div>
                                        </div>
                                        </a>
                                    </td>
                                    {{--<td class="view-message  text-right"><a href="{{route('payment_show_path', $inquires->id)}}" class="text-primary"><i class="fas fa-credit-card"></i> Payment Methods</a></td>--}}
                                </tr>
                            @endforeach
                        @endif
                    @else
                        @if ($inquires->id_paquetes == 0 AND $inquires->idusuario == Auth::user()->id AND $inquires->estado == 4)
                            @php $pay_total = 0; @endphp
                            @foreach($payment->where('idinquires', $inquires->id)->where('estado', 0) as $payments)
                                @php
                                    $pay_total = $pay_total + $payments->a_cuenta
                                @endphp
                            @endforeach
                            @php
                                $porcen =  100 - (($pay_total*100)/$inquires->price);
                            @endphp
                            <tr class='unread'>
                                <td class="inbox-small-cells">
                                    <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox" onclick="chk_del()">
                                </td>
                                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                                <td class="view-message  dont-show"><a href="{{route('payment_show_path', $inquires->id)}}" class="hover-underline">{{ucwords(strtolower($inquires->name))}} <span class="grey-text d-block small">{{strtolower($inquires->email)}} X {{$inquires->traveller}}</span></a></td>
                                {{--<td class="view-message font-weight-light font-italic">Sin paquete seleccionado</td>--}}
                                {{--<td class="view-message  inbox-small-cells"><span class="grey-text">{{$inquires->city}}</span></td>--}}
                                {{--<td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>--}}
                                {{--@php--}}
                                    {{--date_default_timezone_set('America/Lima');--}}
                                    {{--$date_a = date('Y-m-d');--}}
                                    {{--$date_i = $inquires->created_at;--}}
                                    {{--$date_i = strftime('%Y-%m-%d', strtotime($date_i));--}}
                                {{--@endphp--}}
                                {{--@if ($date_a == $date_i)--}}
                                    {{--<td class="view-message  text-right">{{$inquires->time}}</td>--}}
                                {{--@else--}}
                                    {{--<td class="view-message  text-right">{{strftime("%d %b", strtotime(str_replace('-','/', $inquires->created_at)))}}</td>--}}
                                {{--@endif--}}
                                {{--<td class="view-message  text-right"><a href="{{route('payment_show_path', $inquires->id)}}" class="text-primary"><i class="fas fa-credit-card"></i> Payment Methods</a></td>--}}
                                <td>
                                    <a href="{{route('payment_show_path', $inquires->id)}}">
                                        <div class="progress md-progress" style="height: 20px; width: 100%">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{round($porcen, 2)}}%; height: 20px" aria-valuenow="{{round($porcen, 2)}}" aria-valuemin="0" aria-valuemax="100">{{round($porcen, 2)}}%</div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @elseif ($inquires->id_paquetes > 0 AND $inquires->idusuario == Auth::user()->id AND $inquires->estado == 4)
                            @php $pay_total = 0; @endphp
                            @foreach($package->where('id', $inquires->id_paquetes) as $packages)
                                @foreach($payment->where('idinquires', $inquires->id)->where('estado', 0) as $payments)
                                    @php
                                        $pay_total = $pay_total + $payments->a_cuenta
                                    @endphp
                                @endforeach
                                @php
                                    $porcen =  100 - (($pay_total*100)/$inquires->price);
                                @endphp

                                <tr class='unread'>
                                    <td class="inbox-small-cells">
                                        <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox" onclick="chk_del()">
                                    </td>
                                    {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                                    <td class="view-message  dont-show"><a href="{{route('payment_show_path', $inquires->id)}}" class="hover-underline">{{ucwords(strtolower($inquires->name))}} <span class="grey-text d-block small">{{strtolower($inquires->email)}} X {{$inquires->traveller}}</span></a></td>
                                    {{--                            <td class="view-message ">{{ucwords($packages->codigo)}}</td>--}}
                                    {{--<td class="view-message  inbox-small-cells"><span class="grey-text">{{$inquires->city}}</span></td>--}}
                                    {{--<td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>--}}
                                    {{--@php--}}
                                        {{--date_default_timezone_set('America/Lima');--}}
                                        {{--$date_a = date('Y-m-d');--}}
                                        {{--$date_i = $inquires->created_at;--}}
                                        {{--$date_i = strftime('%Y-%m-%d', strtotime($date_i));--}}
                                    {{--@endphp--}}
                                    {{--@if ($date_a == $date_i)--}}
                                        {{--<td class="view-message  text-right">{{$inquires->time}}</td>--}}
                                    {{--@else--}}
                                        {{--<td class="view-message  text-right">{{strftime("%d %b", strtotime(str_replace('-','/', $inquires->created_at)))}}</td>--}}
                                    {{--@endif--}}
                                    {{--<td class="view-message  text-right"><a href="{{route('payment_show_path', $inquires->id)}}" class="text-primary"><i class="fas fa-credit-card"></i> Payment Methods</a></td>--}}
                                    <td>
                                        <a href="{{route('payment_show_path', $inquires->id)}}">
                                            <div class="progress md-progress" style="height: 20px; width: 100%">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{round($porcen, 2)}}%; height: 20px" aria-valuenow="{{round($porcen, 2)}}" aria-valuemin="0" aria-valuemax="100">{{round($porcen, 2)}}%</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                @endforeach
                {{--<tr class="unread">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Google Webmaster </td>--}}
                {{--<td class="view-message">Improve the search presence of WebSite</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">March 15</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">JW Player</td>--}}
                {{--<td class="view-message">Last Chance: Upgrade to Pro for </td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">March 15</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Tim Reid, S P N</td>--}}
                {{--<td class="view-message">Boost Your Website Traffic</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">April 01</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="view-message dont-show">Freelancer.com <span class="label label-danger pull-right">urgent</span></td>--}}
                {{--<td class="view-message">Stop wasting your visitors </td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">May 23</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="view-message dont-show">WOW Slider </td>--}}
                {{--<td class="view-message">New WOW Slider v7.8 - 67% off</td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">March 14</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="view-message dont-show">LinkedIn Pulse</td>--}}
                {{--<td class="view-message">The One Sign Your Co-Worker Will Stab</td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">Feb 19</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Drupal Community<span class="label label-success pull-right">megazine</span></td>--}}
                {{--<td class="view-message view-message">Welcome to the Drupal Community</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">March 04</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Facebook</td>--}}
                {{--<td class="view-message view-message">Somebody requested a new password </td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">June 13</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Skype <span class="label label-info pull-right">family</span></td>--}}
                {{--<td class="view-message view-message">Password successfully changed</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">March 24</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="view-message dont-show">Google+</td>--}}
                {{--<td class="view-message">alireza, do you know</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">March 09</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="dont-show">Zoosk </td>--}}
                {{--<td class="view-message">7 new singles we think you'll like</td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">May 14</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">LinkedIn </td>--}}
                {{--<td class="view-message">Alireza: Nokia Networks, System Group and </td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">February 25</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="dont-show">Facebook</td>--}}
                {{--<td class="view-message view-message">Your account was recently logged into</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">March 14</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Twitter</td>--}}
                {{--<td class="view-message">Your Twitter password has been changed</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">April 07</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">InternetSeer Website Monitoring</td>--}}
                {{--<td class="view-message">http://golddesigner.org/ Performance Report</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">July 14</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="view-message dont-show">AddMe.com</td>--}}
                {{--<td class="view-message">Submit Your Website to the AddMe Business Directory</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">August 10</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Terri Rexer, S P N</td>--}}
                {{--<td class="view-message view-message">Forget Google AdWords: Un-Limited Clicks fo</td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">April 14</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Bertina </td>--}}
                {{--<td class="view-message">IMPORTANT: Don't lose your domains!</td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">June 16</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>--}}
                {{--<td class="view-message dont-show">Laura Gaffin, S P N </td>--}}
                {{--<td class="view-message">Your Website On Google (Higher Rankings Are Better)</td>--}}
                {{--<td class="view-message inbox-small-cells"></td>--}}
                {{--<td class="view-message text-right">August 10</td>--}}
                {{--</tr>--}}
                {{--<tr class="">--}}
                {{--<td class="inbox-small-cells">--}}
                {{--<input type="checkbox" class="mail-checkbox">--}}
                {{--</td>--}}
                {{--<td class="inbox-small-cells"><i class="fa fa-star"></i></td>--}}
                {{--<td class="view-message dont-show">Facebook</td>--}}
                {{--<td class="view-message view-message">Alireza Zare Login faild</td>--}}
                {{--<td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>--}}
                {{--<td class="view-message text-right">feb 14</td>--}}
                {{--</tr>--}}
                </tbody>
            </table>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#table_send').DataTable({
                "info": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endpush
