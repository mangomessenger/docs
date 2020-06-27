@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('type-param.store', $type->id) }}">
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
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                  rows="2">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="type_id" class="custom-select custom-select @error("type_id") is-invalid @enderror">
                            @foreach(\App\Type::all() as $typeOption)
                                <option @if($typeOption->name === old("type_id")) selected @endif value="{{ $typeOption->id }}">{{ $typeOption->name }}</option>
                            @endforeach
                                <option>TEST</option>
                        </select>
                        @error("type_id")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Type Parameter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
