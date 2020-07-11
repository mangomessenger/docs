<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 text-lg-left text-center pb-3">
                <div class="row">
                    <b>{{ config('app.name', 'Laravel') }}</b>
                </div>
                <div class="row pr-5 pt-2">
                    Mango Messenger is a mobile and desktop messaging app with a focus on security and speed.
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <b>About</b>
                        </div>
                        <div class="row">
                            <a href="{{ route('home') }}">Main Page</a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row">
                            <b>Apps</b>
                        </div>
                        <div class="row">
                            <a href="#" class="disabled">Google Play</a>
                        </div>
                        <div class="row">
                            <a href="#" class="disabled">Apple Store</a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="row">
                            <b>Platform</b>
                        </div>
                        <div class="row">
                            <a href=" {{ route('api') }}">API</a>
                        </div>
                        <div class="row">
                            <a href=" {{ route('types') }}">Types</a>
                        </div>
                        <div class="row">
                            <a href=" {{ route('methods') }}">Methods</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->
