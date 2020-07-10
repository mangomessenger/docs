@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Error Categories</h2>
        </div>

        <div class="row">
            <a class="btn btn-primary" href="{{ route('error-category.create') }}">Create new</a>
        </div>

        <div class="row py-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->code }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
{{--                            <a class="btn btn-primary w-100 mt-1" href="{{ route('type.edit', $category) }}">Edit</a>--}}
{{--                            <form method="post" action="{{ route("type.destroy", $category) }}">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger w-100 mt-1">Delete</button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
