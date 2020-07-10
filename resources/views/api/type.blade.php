@extends('layouts.app')

@section('content')
    <div class="row">
        <h5><b>{{ $type->name }}</b></h5>
    </div>
    <div class="row">
        <p>{{ $type->description }}</p>
    </div>
    @include('api.partials.parameters_table')

    <div class="row pt-5 pb-2">
        <h5 class="font-weight-bold">Methods</h5>
    </div>
    @include('api.partials.methods_table')
@endsection
