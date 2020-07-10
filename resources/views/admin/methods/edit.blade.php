@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('method.update', $method->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag</label>
                        <select name="tag_id" class="custom-select custom-select @error("tag_id") is-invalid @enderror">
                            @foreach(\App\MethodTag::all() as $tag)
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
                            @foreach(\App\Method::$types as $methodType)
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
                            @foreach(\App\Type::all() as $typeOption)
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
                                  rows="2">{{ old('description') ?? $method->description }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Update Method</button>
                </form>
            </div>
        </div>
    </div>
@endsection
