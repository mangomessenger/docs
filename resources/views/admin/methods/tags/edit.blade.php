@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('methods.tags.update', $tag) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" class="form-control" disabled
                               value="{{ $tag->tag }}">
                    </div>
                    @error('tag')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') ?? $tag->description }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Update Method Tag</button>
                </form>
            </div>
        </div>
    </div>
@endsection
