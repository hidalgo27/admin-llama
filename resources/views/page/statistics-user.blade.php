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
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (10).jpg" class="rounded-circle img-fluid"
                                                 alt="First sample avatar image">
                                        </div>
                                        <!-- Content -->
                                        <div class="card-body">
                                            <h4 class="font-weight-bold mt-1 mb-3">Maria Kate</h4>
                                            <p class="font-weight-bold dark-grey-text">Photographer</p>
                                            <!-- Triggering button -->
                                            <a class="rotate-btn grey-text" data-card="card-1">
                                                <i class="fa fa-repeat grey-text"></i> Click here to rotate</a>
                                        </div>
                                    </div>
                                    <!-- Front Side -->
                                    <!-- Back Side -->
                                    <div class="face back">
                                        <!-- Content -->
                                        <div class="card-body">
                                            <!-- Content -->
                                            <h4 class="font-weight-bold mt-4 mb-2">
                                                <strong>About me</strong>
                                            </h4>
                                            <hr>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime quae, dolores dicta.
                                                Blanditiis rem amet repellat, dolores nihil quae in mollitia asperiores ut rerum repellendus,
                                                voluptatum eum, officia laudantium quaerat?
                                            </p>

                                            <!-- Social Icons -->
                                            <!-- Triggering button -->

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
                <div class="col"></div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>

    </script>
@endpush