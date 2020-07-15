@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Methods</h2>
        </div>

        <div class="row">
            <a class="btn btn-primary" href="{{ route('methods.create') }}">Create new</a>
        </div>

        <div class="row py-3 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Tag</th>
                    <th scope="col">Name</th>
                    <th scope="col">Method</th>
                    <th scope="col">Description</th>
                    <th scope="col">Return Type</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($methods as $method)
                    <tr>
                        <td>{{ $method->tag->tag }}</td>
                        <td>
                            <a @if($method->visible) href="{{ route('method', $method->formatName()) }}" @endif>
                                {{ $method->name }}
                            </a>
                            @if(!$method->visible) <h4 class="pt-2"><span class="badge badge-pill badge-secondary">Invisible</span></h4> @endif
                        </td>
                        <td>{{ $method->type }}</td>
                        <td>{{ $method->description }}</td>
                        <td><a href="{{ route('type', $method->returnType) }}">{{ $method->returnType->name }}</a></td>
                        <td>
                            <a class="btn btn-primary w-100 mt-1" href="{{ route('methods.edit', $method) }}">Edit</a>
                            <form method="post" action="{{ route("methods.destroy", $method) }}">
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
