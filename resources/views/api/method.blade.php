@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="pb-3">
            <div class="row">
                <h5 class="font-weight-bold">Endpoint:</h5>
            </div>
            <div class="row">
                <h3><code>{{ $method->name }}</code></h3>
            </div>
        </div>


        <div class="row pb-3">
            <h5 class="font-weight-bold">Type -</h5>
            <h5 class="pl-1">@include('api.partials.method_type', ['type' => $method->type])</h5>
        </div>

        <div>
            <div class="row">
                <h5 class="font-weight-bold">Description:</h5>
            </div>
            <div class="row">
                <p>{{ $method->description }}</p>
            </div>
        </div>

        @include('api.partials.json', ['json' => $payload, 'title'=> 'Payload:'])

        @include('api.partials.parameters_table')

        <div class="py-3">
            <div class="row">
                <h5 class="font-weight-bold">Result</h5>
            </div>

            <div class="row">
                <a href="{{ route('type', $method->returnType->name) }}">{{ $method->returnType->name }}</a>
            </div>
        </div>

        @include('api.partials.json', ['json' => $response, 'title'=> 'Response:'])

        @include('api.partials.errors_table')
    </div>
@endsection
