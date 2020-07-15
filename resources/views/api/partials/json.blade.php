@if (!is_null($json) && $json != "")
    <div class="row">
        <h5 class="font-weight-bold">{{ $title }}</h5>
    </div>
    <br/>
    <div class="row bg-gray pl-4 pt-3">
        {!! $json !!}
    </div>
@endif
