@extends('layouts.app')

@section('content')
    <div class="container-content center-block">
        <div class="container">
            <b>{{ "$method->name" }}</b>
            <p>{{ $method->description }}</p>
            <samp>This text is meant to be treated as sample output from a computer program.</samp>
        </div>

    </div>
@endsection
