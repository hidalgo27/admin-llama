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
    @foreach($user as $users)
        @php $k = 0; $j = 0; $i = 0; $h = 0; @endphp
        @foreach($users->roles->where('name', 'sales') as $rol)
            @foreach($inquire->where('estado', '<', 3) as $inquires)
                @php $i++; @endphp
            @endforeach
            @foreach($inquire->where('idusuario', $users->id)->where('estado', '<', 3)->where('estado', 2) as $inquires)
                @php $j++; @endphp
            @endforeach
            @foreach($inquire->where('idusuario', $users->id)->where('estado', '<', 3) as $inquires)
                @php $k++; @endphp
            @endforeach

            @foreach($inquire->where('idusuario', $users->id)->where('estado', 4) as $inquires)
                @php $h++; @endphp
            @endforeach
            {{--<div class="container mt-5">--}}
            {{--<div class="row pt-5">--}}
            {{----}}
            {{--</div>--}}
            {{--</div>--}}
            @php
                $user_v = $users->name;
                $rol_v = $rol->name;
                $closing_v = $h;
                $inquires_v = $k;
                $response_v = $j;
                $total = $i;
            @endphp

        @endforeach
    @endforeach

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col-4">
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-lg-12 col-md-12 mb-lg-0 mb-4">
                            <!-- Rotating card -->
                            <div class="card-wrapper">
                                <div id="card-1" class="card card-rotating text-center">
                                    <!-- Front Side -->
                                    <div class="face front">
                                        <!-- Image -->
                                        <div class="card-up">
                                            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/19.jpg" alt="Team member card image">
                                        </div>
                                        <!-- Avatar -->
                                        <div class="avatar mx-auto white">
                                            <img src="{{asset('images/'.$users->email.'.jpg')}}" class="rounded-circle img-fluid"
                                                 alt="First sample avatar image">
                                        </div>
                                        <!-- Content -->
                                        <div class="card-body">
                                            <h4 class="font-weight-bold ">{{ucwords(strtolower($user_v))}}</h4>
                                            <p class="font-weight-bold dark-grey-text">{{strtoupper($rol_v)}}</p>
                                            <!-- Triggering button -->
                                        </div>
                                    </div>
                                    <!-- Front Side -->
                                    <!-- Back Side -->
                                    <div class="face back">
                                        <!-- Content -->
                                        <div class="card-body">
                                            <!-- Content -->
                                            <h4 class="font-weight-bold mb-2">
                                                <strong>About me</strong>
                                            </h4>
                                            <hr>
                                            <p>Travel advisor {{ucwords(strtolower($user_v))}}.</p>
                                        </div>
                                    </div>
                                    <!-- Back Side -->
                                </div>
                            </div>
                            <!-- Rotating card -->

                        </div>
                        <!-- Grid column -->


                    </div>
                </div>
                <div class="col">

                    <div class="row mb-4 justify-content-center ">
                        <div class="col-12">
                            <form class="bg-light rounded p-2 shadow">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="input-group">
                                            <label for="inputPassword6" class="mr-2 mt-2">From</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" id="i_from" name="from" class="form-control datepicker" aria-describedby="passwordHelpInline" value="{{$fromDate}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group mx-4">
                                            <label for="inputPassword6" class="mr-2 mt-2">To</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <input type="text" id="i_to" name="to" class="form-control datepicker" aria-describedby="passwordHelpInline" value="{{$toDate}}">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        {{--<a href="" class="btn btn-primary mb-2">Submit</a>--}}
                                        <button type="button" class="btn btn-primary mb-2" onclick="range({{$users->id}})">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Inquires</th>
                                            <td>{{$inquires_v}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Response | <a href="#" class="text-primary font-weight-bold small" data-toggle="modal" data-target="#presentation">Presentation</a> | <a href="#" class="text-primary font-weight-bold small" data-toggle="modal" data-target="#farewell">Farewell</a></th>
                                            <td>{{$response_v}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Closing</th>
                                            <td>{{$closing_v}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Average response for inquire</th>
                                            <td>---</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Inquires</th>
                                            <td>{{$total}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="presentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Response and farewell</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                        <div class="card-deck">
                                            @foreach($user as $users)
                                                @php $k = 0; $j = 0; $i = 0; $h = 0; @endphp
                                                @foreach($users->roles->where('name', 'sales') as $rol)
                                                    @foreach($inquire->where('idusuario', $users->id) as $inquires)
                                                        @if($inquires->presentation == NULL)
                                                        @else
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    @php echo $inquires->presentation; @endphp
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="farewell" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">farewell</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-columns">
                                                @foreach($user as $users)
                                                    @php $k = 0; $j = 0; $i = 0; $h = 0; @endphp
                                                    @foreach($users->roles->where('name', 'sales') as $rol)
                                                        @foreach($inquire->where('idusuario', $users->id) as $inquires)
                                                            @if($inquires->presentation == NULL)
                                                            @else
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        @php echo $inquires->farewell; @endphp
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
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
        function range(id){
            var $from = $('#i_from').val();
            var $to = $('#i_to').val();
            window.location.href = '../../'+id+'/'+$from+'/'+$to;

        }

        $( function() {
            $( ".datepicker" ).datepicker(
                {
                    dateFormat: 'yy-mm-dd'
                }
            );
        } );
    </script>
@endpush
