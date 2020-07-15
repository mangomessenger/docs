@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pb-3">
            <h2>Methods</h2>
        </div>

        @foreach($tags as $tag)
            <div class="row">
                <h4 class="font-weight-bold">{{ $tag->description }}</h4>
            </div>

            @include('api.partials.methods_table', ['methods' => $tag->methods, 'showLabel' => false])
        @endforeach
    </div>
@endsection
