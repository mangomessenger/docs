<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="{{ route('home') }}"><span>{{ config('app.name') }}</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Apps</a></li>
                <li><a href="{{ route('api') }}">API</a></li>

                <li class="get-started"><a href="{{ route('api') }}">Get Started</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
