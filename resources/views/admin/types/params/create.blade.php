@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('type-params.store', $type->id) }}">
                    @csrf
                    <div class="py-3">
                        <h5><b>{{ $type->name }}</b></h5>
                        <h5>{{ $type->description }}</h5>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <input type="hidden" name="type_id" value="{{ $type->id }}">

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="return_type_id" class="custom-select custom-select @error("return_type_id") is-invalid @enderror">
                            @foreach($types as $typeOption)
                                <option @if($typeOption->id == old("return_type_id")) selected @endif value="{{ $typeOption->id }}">{{ $typeOption->name }}</option>
                            @endforeach
                        </select>
                        @error("return_type_id")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Type Parameter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
