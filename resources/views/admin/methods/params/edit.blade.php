@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('methods.params.update', $methodParam) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') ?? $methodParam->name }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="4">{{ old('description') ?? $methodParam->description }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="return_type_id" class="custom-select custom-select @error("return_type_id") is-invalid @enderror">
                            @foreach($types as $type)
                                <option @if($type->id == (old("return_type_id") ?? $methodParam->return_type_id)) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error("return_type_id")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group form-check">
                        <div class="row">
                            <label for="name">Additional</label>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <input type="checkbox" class="form-check-input" name="required" value="1" @if(old('required') ?? $methodParam->is_required) checked @endif>
                                <label class="form-check-label">Required</label>
                            </div>
                            <div class="col">
                                <input type="checkbox" class="form-check-input" name="array" value="1" @if(old('array') ?? $methodParam->is_array) checked @endif>
                                <label class="form-check-label">Array</label>
                            </div>
                        </div>

                        @error("required")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        @error("array")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Edit Method Parameter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
