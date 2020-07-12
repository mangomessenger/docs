@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="row">
            <h5><b>{{ $method->name }}</b></h5>
        </div>
        <div class="row">
            <p>{{ $method->description }}</p>
        </div>

        @include('api.partials.parameters_table')

        <div class="py-3">
            <div class="row">
                <h5 class="font-weight-bold">Result</h5>
            </div>

            <div class="row">
                <a href="{{ route('type', $method->returnType) }}">{{ $method->returnType->name }}</a>
            </div>
        </div>

        @include('api.partials.errors_table')
    </div>
@endsection
