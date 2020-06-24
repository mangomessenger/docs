@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Types</h2>
        </div>

        @include('api.partials.types_table')
    </div>
@endsection
