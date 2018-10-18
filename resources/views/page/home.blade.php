@extends('layouts.default')
{{--@section('nav')--}}
    {{--@parent--}}
    {{--@include('layouts.nav')--}}
{{--@endsection--}}
{{--@section('sidebar')--}}
    {{--@parent--}}
    {{--@include('layouts.sidebar')--}}
{{--@endsection--}}
@section('content')
    @include('layouts.inblox-list')
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endpush