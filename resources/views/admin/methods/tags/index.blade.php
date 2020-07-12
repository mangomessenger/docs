@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Method Tags</h2>
        </div>

        <div class="row">
            <a class="btn btn-primary" href="{{ route('methods.tags.create') }}">Create new</a>
        </div>

        <div class="row py-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Tag</th>
                    <th scope="col">Descripton</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>
                        <td>{{ $tag->description }}</td>
                        <td>
                            <a class="btn btn-primary w-100 mt-1" href="{{ route('methods.tags.edit', $tag) }}">Edit</a>
                            <form method="post" action="{{ route("methods.tags.destroy", $tag) }}">
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
