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
            <div class="row py-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($tag->methods as $method)
                            <td><a href="{{ route('method', $method->name) }}">{{ $method->name }}</a></td>
                            <td>{{ $method->description }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>

        @endforeach
    </div>
@endsection
