@extends('layouts.app')

@section('content')
    <div class="container-content center-block">
        <div class="container">
            <h5><b>{{ $method->name }}</b></h5>
            <p>{{ $method->description }}</p>
        </div>
    </div>
@endsection
