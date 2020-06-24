@extends('layouts.app')

@section('content')
    <div class="container-content center-block">
        <div class="container">
            <b>{{ "$method->name" }}</b>
            <p>{{ $method->description }}</p>
        </div>
    </div>
@endsection
