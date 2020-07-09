@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Methods</h2>
        </div>

        <div class="row">
            <a class="btn btn-primary" href="{{ route('method.create') }}">Create new</a>
        </div>

        <div class="row py-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Method</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($methods as $method)
                    <tr>
                        <td><a href="{{ route('method', $method->name) }}">{{ $method->name }}</a></td>
                        <td>{{ $method->type }}</td>
                        <td>{{ $method->description }}</td>
                        <td>
                            <a class="btn btn-primary w-100 mt-1" href="{{ route('method.edit', $method) }}">Edit</a>
{{--                            <form method="post" action="{{ route("type.destroy", $method) }}">--}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 mt-1">Delete</button>
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
