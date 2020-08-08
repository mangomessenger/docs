@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('errors.update', $error) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category_id" class="custom-select custom-select @error("category_id") is-invalid @enderror">
                            @foreach($errorCategories as $category)
                                <option @if($category->id == (old("category_id") ?? $error->category_id )) selected @endif value="{{ $category->id }}">{{ $category->fullName()}}</option>
                            @endforeach
                        </select>
                        @error("category_id")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type"
                               value="{{ old('type') ?? $error->type }}">
                    </div>
                    @error('type')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                  rows="4">{{ old('message') ?? $error->message }}</textarea>
                    </div>
                    @error('message')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Create Error</button>
                </form>
            </div>
        </div>
    </div>
@endsection
