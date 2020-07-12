@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('methods.tags.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag"
                               value="{{ old('tag') }}">
                    </div>
                    @error('tag')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Create Method Tag</button>
                </form>
            </div>
        </div>
    </div>
@endsection
