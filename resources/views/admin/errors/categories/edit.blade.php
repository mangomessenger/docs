@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('errors.categories.update', $category) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Status Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                               value="{{ old('code') ?? $category->code }}">
                    </div>
                    @error('code')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') ?? $category->name }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') ?? $category->description }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Update Error Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
