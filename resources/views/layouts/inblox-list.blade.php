<div class="row sticky-top sticky-top-50 bg-white mb-3">
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
                <a id="d_mailbtn" data-placement="top" class="btn mini tooltips d-none" onclick="chk_trash()">
                    <i class="fa fa-trash" id="d_trash"></i>
                    <i class="fas fa-spinner fa-pulse d-none" id="d_spinner"></i>
                </a>
                {{--<button type="button" class="btn mini tooltips d-none" id="d_mailbtn" onclick="chk_trash()">--}}
                    {{--<i class="fa fa-trash" id="d_trash"></i>--}}
                    {{--<i class="fas fa-spinner fa-pulse d-none" id="d_spinner"></i>--}}
                {{--</button>--}}
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
<form id="h_form" role="form">
    {{csrf_field()}}
<table id="dtBasicExample2" class="table table-inbox table-hover">
    <thead>
    <tr class="bg-light d-none">
        <th class="th-sm p-0">
            {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        </th>
        <th class="th-sm p-0">
            {{--<i class="fa fa-sort float-right" aria-hidden="true"></i>--}}
        </th>
        <th class="th-sm p-0 pl-2">Duration
            <i class="fa fa-sort" aria-hidden="true"></i>
        </th>
        <th class="th-sm p-0">

        </th>
        <th class="th-sm p-0">

        </th>
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
            @if ($inquires->id_paquetes == 0 AND ($inquires->estado == 0 OR $inquires->estado == 1))
                <tr class='unread'>
                    <td class="inbox-small-cells">
                        <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox" onclick="chk_del()">
                    </td>
                    <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                    <td class="view-message  dont-show"><a href="{{route('message_path', [$inquires->id, 0])}}" class="hover-underline">{{$inquires->email}} X {{$inquires->traveller}}</a></td>
                    <td class="view-message font-weight-light font-italic">Sin paquete seleccionado</td>
                    <td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>
                    @php
                        date_default_timezone_set('America/Lima');
                        $date_a = date('Y-m-d');
                        $date_i = $inquires->created_at;
                        $date_i = strftime('%Y-%m-%d', strtotime($date_i));
                    @endphp
                    @if ($date_a == $date_i)
                        <td class="view-message  text-right">{{$inquires->time}}</td>
                    @else
                        <td class="view-message  text-right">{{strftime("%d %b", strtotime(str_replace('-','/', $inquires->created_at)))}}</td>
                    @endif
                </tr>
            @elseif($inquires->id_paquetes AND ($inquires->estado == 0 OR $inquires->estado == 1))
            @foreach($package->where('id', $inquires->id_paquetes) as $packages)
                    <tr class='unread'>
                        <td class="inbox-small-cells">
                            <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox" onclick="chk_del()">
                        </td>
                        <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                        <td class="view-message  dont-show"><a href="{{route('message_path', [$inquires->id, $packages->id])}}" class="hover-underline">{{$inquires->email}} X {{$inquires->traveller}}</a></td>
                            <td class="view-message ">{{ucwords($packages->codigo)}}: {{ucwords(strtolower($packages->titulo))}} | {{$inquires->duration}} days</td>
                        <td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>
                        @php
                            date_default_timezone_set('America/Lima');
                            $date_a = date('Y-m-d');
                            $date_i = $inquires->created_at;
                            $date_i = strftime('%Y-%m-%d', strtotime($date_i));
                        @endphp
                        @if ($date_a == $date_i)
                            <td class="view-message  text-right">{{$inquires->time}}</td>
                        @else
                            <td class="view-message  text-right">{{strftime("%d %b", strtotime(str_replace('-','/', $inquires->created_at)))}}</td>
                        @endif
                    </tr>
                @endforeach
            @endif
        @else
            @if ($inquires->id_paquetes == 0 AND $inquires->idusuario == Auth::user()->id AND ($inquires->estado == 0 OR $inquires->estado == 1))
                <tr class='unread'>
                    <td class="inbox-small-cells">
                        <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox" onclick="chk_del()">
                    </td>
                    <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                    <td class="view-message  dont-show"><a href="{{route('message_path', [$inquires->id, 0])}}" class="hover-underline">{{$inquires->email}} X {{$inquires->traveller}}</td></a>
                    <td class="view-message font-weight-light font-italic">Sin paquete seleccionado</td>
                    <td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>
                    <td class="view-message  text-right">{{$inquires->time}}</td>
                </tr>
            @elseif ($inquires->id_paquetes > 0 AND $inquires->idusuario == Auth::user()->id AND ($inquires->estado == 0 OR $inquires->estado == 1))
                
                @foreach($package->where('id', $inquires->id_paquetes) as $packages)
                    <tr class='unread'>
                        <td class="inbox-small-cells">
                            <input type="checkbox" name="chk_mail[]" value="{{$inquires->id}}" class="mail-checkbox" onclick="chk_del()">
                        </td>
                        <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                        <td class="view-message  dont-show"><a href="{{route('message_path', [$inquires->id, $packages->id])}}" class="hover-underline">{{$inquires->email}} X {{$inquires->traveller}}</td></a>
                        <td class="view-message ">{{ucwords($packages->codigo)}}: {{ucwords(strtolower($packages->titulo))}} | {{$inquires->duration}} days</td>
                        <td class="view-message  inbox-small-cells"><span class="badge {{$badged}}">{{$inquires->usuario->name}}</span></td>
                        <td class="view-message  text-right">{{$inquires->time}}</td>
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
@push('script')
    <script>
        // $(document).ready(function () {
        //     $('#dtBasicExample2').DataTable();
        //     $('.dataTables_length').addClass('bs-select');
        // });
    </script>
@endpush