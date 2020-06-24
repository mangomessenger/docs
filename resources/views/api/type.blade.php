@extends('layouts.app')

@section('content')
    <div class="container-content center-block">
        <div class="container">
            <h5><b>{{ $type->name }}</b></h5>
            <p>{{ $type->description }}</p>
        </div>
    </div>
@endsection
