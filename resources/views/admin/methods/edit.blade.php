@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('methods.update', $method->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag</label>
                        <select name="tag_id" class="custom-select custom-select @error("tag_id") is-invalid @enderror">
                            @foreach($tags as $tag)
                                <option @if($tag->id == (old("tag_id") ?? $method->tag_id)) selected
                                        @endif value="{{ $tag->id }}">{{ $tag->tag }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("tag_id")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') ?? $method->name }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="custom-select custom-select @error("type") is-invalid @enderror">
                            @foreach($methodTypes as $methodType)
                                <option
                                    @if($methodType == (old("type") ?? $method->type)) selected @endif>{{ $methodType }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("type")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="name">Returns</label>
                        <select name="return_type_id"
                                class="custom-select custom-select @error("return_type_id") is-invalid @enderror">
                            @foreach($types as $typeOption)
                                <option
                                    @if($typeOption->id == (old("return_type_id") ?? $method->return_type_id)) selected
                                    @endif value="{{ $typeOption->id }}">{{ $typeOption->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("return_type_id")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') ?? $method->description }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Update Method</button>
                </form>
            </div>
        </div>

        <div class="row pt-5 pb-2">
            <h4 class="font-weight-bold">Parameters</h4>
            <div class="col-2 ml-2">
                <a class="btn btn-primary w-100" href="{{ route('methods.params.create', $method) }}">Add</a>
            </div>
        </div>

        <div class="row pt-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($method->params as $param)
                    <tr>
                        <td>{{ $param->name }}</td>
                        <td><a href="{{ route('type', $param->returnType) }}">{{ $param->returnType->name }}</a></td>
                        <td>{{ $param->description }}</td>
                        <td>
                            <a class="btn btn-primary w-100 mt-1"
                               href="{{ route('methods.params.edit', $param) }}">Edit</a>
                            <form method="post" action="{{ route('methods.params.destroy', $param) }}">
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

        <div class="row pt-5 pb-2">
            <h4 class="font-weight-bold">Errors</h4>
        </div>
        <form method="post" action="{{ route('method.errors.add', $method) }}">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <select name="error_id"
                                        class="custom-select custom-select w-100">
                                    @foreach($allErrors as $error)
                                        <option
                                            value="{{ $error->id }}">{{ "{$error->type} - {$error->category->fullName()}" }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary w-100" @if($allErrors->isEmpty()))
                                    disabled @endif>Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
        <div class="row pt-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($method->errors as $error)
                    <tr>
                        <td>{{ $error->type }}</td>
                        <td>{{ $error->category->fullName()  }}</td>
                        <td>{{ $error->message }}</td>
                        <td>
                            <form method="post" action="{{ route("method.errors.remove", [$method, $error]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 mt-1">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row pt-5 pb-2">
            <h4 class="font-weight-bold">Other actions</h4>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('methods.payload.edit', $method) }}" class="btn btn-primary w-100">Edit
                            Payload</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('methods.response.edit', $method) }}" class="btn btn-primary w-100">Edit
                            Response</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
