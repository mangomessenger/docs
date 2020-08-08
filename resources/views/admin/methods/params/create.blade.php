@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('methods.params.store', $method->id) }}">
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
                                  rows="4">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="return_type_id" class="custom-select custom-select @error("return_type_id") is-invalid @enderror">
                            @foreach($types as $type)
                                <option @if($type->id == old("return_type_id")) selected @endif value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error("return_type_id")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

{{--                    <div class="form-group form-check">--}}
{{--                        <div class="row text-center">--}}
{{--                            <div class="col">--}}
{{--                                <input type="checkbox" class="form-check-input" name="required">--}}
{{--                                <label class="form-check-label" for="exampleCheck1">Required</label>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <input type="checkbox" class="form-check-input" name="array">--}}
{{--                                <label class="form-check-label" for="exampleCheck1">Array</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <button type="submit" class="btn btn-primary w-100">Create Method Parameter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
