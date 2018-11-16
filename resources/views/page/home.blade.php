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
    @include('layouts.inbox-list')
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });


            //set initial state.
            // $('#textbox1').val($(this).is(':checked'));
            //
            // $('#checkbox1').change(function() {
            //     $('#textbox1').val($(this).is(':checked'));
            // });


            function chk_del() {

                var s_mail = document.getElementsByName('chk_mail[]');
                var $mail = "";
                for (var i = 0, l = s_mail.length; i < l; i++) {
                    if (s_mail[i].checked) {
                        $mail += s_mail[i].value+',';
                    }
                }
                s_mail = $mail.substring(0,$mail.length-1);

                if (s_mail.length == 0 ){
                    $(".d_mailbtn").addClass('d-none');
                }else{
                    $(".d_mailbtn").removeClass('d-none');
                }
            }

        function chk_trash() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
            $("#d_mailbtn").attr("disabled", true);
            var s_mail = document.getElementsByName('chk_mail[]');
            var $mail = "";
            for (var i = 0, l = s_mail.length; i < l; i++) {
                if (s_mail[i].checked) {
                    $mail += s_mail[i].value+',';
                }
            }
            s_mail = $mail.substring(0,$mail.length-1);
            if (s_mail.length == 0 ){
                $('#h_name').css("border-bottom", "2px solid #FF0000");
                var delMail = "false";
            }else{
                var delMail = "true";
            }


            if(delMail == "true"){
                var datos = {
                    "txt_mails" : s_mail,
                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('remove_inquire_path')}}",
                    type:  'post',
                    beforeSend: function () {
                        // $('#de_send').removeClass('show');
                        $("#d_trash ").addClass('d-none');
                        $("#d_spinner").removeClass('d-none');
                    },
                    success:  function (response) {
                        $('#h_form')[0].reset();
                        $('#d_trash').removeClass('d-none');
                        $("#d_spinner").addClass('d-none');
                        // $('#h_alert').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        // $("#h_alert").fadeIn('slow');
                        $("#d_mailbtn").removeAttr("disabled");
                        window.location.href = "{{route('home_path')}}"
                    }
                });
            } else{
                $("#submit_tip").removeAttr("disabled");
            }

        }


        function chk_trash2() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
            $("#d_mailbtn").attr("disabled", true);
            var s_mail = document.getElementsByName('chk_mail[]');
            var $mail = "";
            for (var i = 0, l = s_mail.length; i < l; i++) {
                if (s_mail[i].checked) {
                    $mail += s_mail[i].value+',';
                }
            }
            s_mail = $mail.substring(0,$mail.length-1);
            if (s_mail.length == 0 ){
                $('#h_name').css("border-bottom", "2px solid #FF0000");
                var delMail = "false";
            }else{
                var delMail = "true";
            }


            if(delMail == "true"){
                var datos = {
                    "txt_mails" : s_mail,
                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('restore_inquire_path')}}",
                    type:  'post',
                    beforeSend: function () {
                        // $('#de_send').removeClass('show');
                        $("#d_trash ").addClass('d-none');
                        $("#d_spinner").removeClass('d-none');
                    },
                    success:  function (response) {
                        $('#h_form')[0].reset();
                        $('#d_trash').removeClass('d-none');
                        $("#d_spinner").addClass('d-none');
                        // $('#h_alert').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        // $("#h_alert").fadeIn('slow');
                        $("#d_mailbtn").removeAttr("disabled");
                        window.location.href = "{{route('home_path')}}"
                    }
                });
            } else{
                $("#submit_tip").removeAttr("disabled");
            }

        }

        function chk_sent() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                }
            });
            $("#d_mailbtn2").attr("disabled", true);
            var s_mail = document.getElementsByName('chk_mail[]');
            var $mail = "";
            for (var i = 0, l = s_mail.length; i < l; i++) {
                if (s_mail[i].checked) {
                    $mail += s_mail[i].value+',';
                }
            }
            s_mail = $mail.substring(0,$mail.length-1);
            if (s_mail.length == 0 ){
                $('#h_name').css("border-bottom", "2px solid #FF0000");
                var delMail = "false";
            }else{
                var delMail = "true";
            }


            if(delMail == "true"){
                var datos = {
                    "txt_mails" : s_mail,
                };
                $.ajax({
                    data:  datos,
                    url:   "{{route('sent_inquire_path')}}",
                    type:  'post',
                    beforeSend: function () {
                        // $('#de_send').removeClass('show');
                        $("#d_sent ").addClass('d-none');
                        $("#d_spinner_sent").removeClass('d-none');
                    },
                    success:  function (response) {
                        $('#h_form')[0].reset();
                        $('#d_sent').removeClass('d-none');
                        $("#d_spinner_sent").addClass('d-none');
                        // $('#h_alert').removeClass('d-none');
                        // $("#h_alert b").html(response);
                        // $("#h_alert").fadeIn('slow');
                        $("#d_mailbtn2").removeAttr("disabled");
                        window.location.href = "{{route('home_path')}}"
                    }
                });
            } else{
                $("#submit_tip").removeAttr("disabled");
            }

        }


        $(document).ready(function () {
            $('#dtBasicExample2').DataTable({
                "info": true
            });
            $('.dataTables_length').addClass('bs-select');
        });


    </script>

@endpush
