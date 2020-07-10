@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ route('method-param.store', $method->id) }}">
                    @csrf
                    <div class="py-3">
                        <h5><b>{{ $method->name }}</b></h5>
                        <h5>{{ $method->description }}</h5>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <input type="hidden" name="method_id" value="{{ $method->id }}">

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
                        <select name="return_type_id" class="custom-select custom-select @error("return_type_id") is-invalid @enderror">
                            @foreach(\App\Type::all() as $methodOption)
                                <option @if($methodOption->id == old("return_type_id")) selected @endif value="{{ $methodOption->id }}">{{ $methodOption->name }}</option>
                            @endforeach
                        </select>
                        @error("return_type_id")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Method Parameter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
