@extends('layouts.app')

@section('content')
    <div class="row">
        <h5><b>{{ $type->name }}</b></h5>
    </div>
    <div class="row">
        <p>{{ $type->description }}</p>
    </div>
@include('api.partials.parameters_table')
@endsection
