@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row pt-3">
            <div class="col-lg-9 col-md-8 col-7">
                <h4 class="font-weight-bold">Error Categories</h4>
            </div>

            <div class="col-lg-3 col-md-4 col-5">
                <a class="btn btn-primary w-100" href="{{ route('errors.categories.create') }}">Create new</a>
            </div>
        </div>

        <div class="row py-3 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width: 20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->code }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a class="btn btn-primary w-100" href="{{ route('errors.categories.edit', $category) }}">Edit</a>
                            <form method="post" action="{{ route("errors.categories.destroy", $category) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 mt-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
