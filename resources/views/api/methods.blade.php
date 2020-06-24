@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Methods</h2>

        @foreach($tags as $tag)
            <h2>{{ $tag->name }}</h2>
        @endforeach
    </div>
@endsection
