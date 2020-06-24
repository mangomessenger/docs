@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Types</h2>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="#">Create new</a>
        </div>


        <div class="row py-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($types as $type)
                    <tr>
                        <td><a href="{{ route('type', $type->name) }}">{{ $type->name }}</a></td>
                        <td>{{ $type->description }}</td>
                        <td>
                            <a class="btn btn-primary" href="#">Edit</a>
                            <form method="post" action="{{ route("type.destroy", $type) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
