@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row pt-3">
            <div class="col-lg-9 col-md-8 col-7">
                <h4 class="font-weight-bold">Errors</h4>
            </div>

            <div class="col-lg-3 col-md-4 col-5">
                <a class="btn btn-primary w-100" href="{{ route('errors.create') }}">Create new</a>
            </div>
        </div>

        <div class="row py-3 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Message</th>
                    <th scope="col" style="width: 20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($errors as $error)
                    <tr>
                        <td>{{ $error->type }}</td>
                        <td>{{ $error->category->fullName()  }}</td>
                        <td>{{ $error->message }}</td>
                        <td>
                            <a class="btn btn-primary w-100" href="{{ route('errors.edit', $error) }}">Edit</a>
                            <form method="post" action="{{ route("errors.destroy", $error) }}">
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
