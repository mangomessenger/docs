@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>API DOCS</h2>
                    <p>This API allows you to build your own customized Mango Messenger clients. It is 100% open for all
                        developers who wish to create Mango applications on our platform.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" id="apiTypesBox">
                        <div class="icon-box w-100" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-book"></i></div>
                            <h4 class="title"><a href="{{ route('types') }}">API Types</a></h4>
                            <p class="description">A list of available API types.</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" id="apiMethodsBox">
                        <div class="icon-box w-100" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4 class="title"><a href="{{ route('methods') }}">API Methods</a></h4>
                            <p class="description">A list of available API methods.</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" id="apiErrorsBox">
                        <div class="icon-box w-100" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4 class="title"><a href="{{ route('errors') }}">API Errors</a></h4>
                            <p class="description">A list of available API errors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->
    </div>
@endsection
