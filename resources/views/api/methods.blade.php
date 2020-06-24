@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-3">
            <h2>Methods</h2>
        </div>

        @foreach($tags as $tag)
            <div class="row">
                <h4>{{ $tag->name }}</h4>
            </div>
            @include('api.partials.methods_table')
        @endforeach
    </div>
@endsection
