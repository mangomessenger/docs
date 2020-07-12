@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('types.update', $type) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') ?? $type->name }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') ?? $type->description }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Update Type</button>
                </form>
            </div>
        </div>
        <div class="row pt-5 pb-2">
            <h4 class="font-weight-bold">Parameters</h4>
        </div>
        <div class="row">
            <a class="btn btn-primary" href="{{ route('types.params.create', $type) }}">Create new</a>
        </div>
        <div class="row pt-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($type->params as $param)
                    <tr>
                        <td>{{ $param->name }}</td>
                        <td><a href="{{ route('type', $param->return_type_id) }}">{{ $param->returnType->name }}</a></td>
                        <td>{{ $param->description }}</td>
                        <td>
                            <a class="btn btn-primary w-100 mt-1" href="{{ route('types.params.edit', $param) }}">Edit</a>
                            <form method="post" action="{{ route('types.params.destroy', $param) }}">
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
