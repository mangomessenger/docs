@php
    $success = \Illuminate\Support\Facades\Session::get('success');
    $error = \Illuminate\Support\Facades\Session::get('error');
@endphp

@if(isset($success) || isset($error))
    <div class="row">
        <div class="w-100 alert @if(isset($success)) alert-success @elseif(isset($error)) alert-danger @endif" role="alert">
            @if(isset($success)) {{ $success }} @elseif(isset($error)) {{ $error }} @endif
        </div>
    </div>
@endif
