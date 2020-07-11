<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="{{ route('admin.panel') }}"><span>Panel</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{ route('admin.panel') }}">Home</a></li>
                <li><a href="{{ route('admin.types') }}">Types</a></li>
                <li class="drop-down"><a href="">Methods</a>
                    <ul>
                        <li><a href="{{ route('admin.methods') }}">Methods</a></li>
                        <li><a href="{{ route('admin.method-tags') }}">Tags</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="">Errors</a>
                    <ul>
                        <li><a href="{{ route('admin.errors') }}">Errors</a></li>
                        <li><a href="{{ route('admin.error-categories') }}">Categories</a></li>
                    </ul>
                </li>
                <li><a href="#">Users</a></li>
                <li><a class="nav-link btn-link text-primary underline" href="{{ route('home') }}"><u>Go on main
                            page</u></a></li>

                <li class="get-started"><a href="#"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
