<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div></div>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                @if(isset($title)) <li>{{ $title }}</li> @endif
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->
