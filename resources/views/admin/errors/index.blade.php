@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Errors</h2>
        </div>

        <div class="row">
            <a class="btn btn-primary" href="{{ route('error.create') }}">Create new</a>
        </div>

        <div class="row py-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($errors as $error)
                    <tr>
                        <td>{{ $error->type }}</td>
                        <td>{{ $error->category->fullName()  }}</td>
                        <td>{{ $error->description }}</td>
                        <td>
{{--                            <form method="post" action="{{ route("error-category.destroy", $error) }}">--}}
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
