@extends('layouts.app')

@section('top-section')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Start chatting using Mango Messenger</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Mango Messenger is a mobile and desktop messaging app with a focus on security and speed.</h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="#" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

@include('includes.contribution')

@endsection

@section('content')
    <section>
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat
                        </li>
                        <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit
                        </li>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <a href="#" class="btn-learn-more">Learn More</a>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row">
                <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start"
                     data-aos="fade-right" data-aos-delay="150">
                    <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
                </div>

                <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="icofont-simple-smile"></i>
                                    <span data-toggle="counter-up">65</span>
                                    <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam
                                        architecto ut.</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="icofont-document-folder"></i>
                                    <span data-toggle="counter-up">85</span>
                                    <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et
                                        quia dere tan</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="icofont-clock-time"></i>
                                    <span data-toggle="counter-up">12</span>
                                    <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus
                                        aut voluptate non vel</p>
                                </div>
                            </div>

                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="icofont-award"></i>
                                    <span data-toggle="counter-up">15</span>
                                    <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et
                                        nemo pad der</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Features</h2>
                <p>Why you should switch to Mango Messenger?</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 col-md-4">
                    <div class="icon-box">
                        <i class="ri-chat-private-fill" style="color: #ffbb2c;"></i>
                        <h3>Private</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="ri-rocket-line" style="color: #5578ff;"></i>
                        <h3>Fast</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="ri-information-fill" style="color: #e80368;"></i>
                        <h3>Open</h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-money-dollar-box-fill" style="color: #47aeff;"></i>
                        <h3>Free</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                        <h3>Secure</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-rocket-2-fill" style="color: #ffa76e;"></i>
                        <h3>Powerful</h3>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Features Section -->

@endsection
