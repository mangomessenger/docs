@extends('layouts.admin')

@section('content')
    <div class="container">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title" data-aos="fade-down">
                    <h2>Panel Stats</h2>
                </div>

                <div class="row">
                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-right" data-aos-delay="10">
                            <h4 class="font-weight-bold">Types:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\Type::count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-down" data-aos-delay="10">
                            <h4 class="font-weight-bold">Type params:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\TypeParam::count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-left" data-aos-delay="10">
                            <h4 class="font-weight-bold">Methods:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\Method::count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-right" data-aos-delay="10">
                            <h4 class="font-weight-bold">Method params:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\MethodParam::count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center"  data-aos-delay="10">
                            <h4 class="font-weight-bold">Method tags:</h4>
                            <div class="section-title pb-4" >
                                <h2 data-toggle="counter-up">{{ \App\MethodTag::count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-left" data-aos-delay="10">
                            <h4 class="font-weight-bold">Errors:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\Error::count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-right" data-aos-delay="10">
                            <h4 class="font-weight-bold">Error categories:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\ErrorCategory::count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" style="max-height: 120px">
                        <div class="icon-box w-100 text-center" data-aos="fade-up" data-aos-delay="10">
                            <h4 class="font-weight-bold">Admins:</h4>
                            <div class="section-title pb-4" data-aos="fade-up">
                                <h2 data-toggle="counter-up">{{ \App\User::count() }}</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Services Section -->
    </div>
@endsection
