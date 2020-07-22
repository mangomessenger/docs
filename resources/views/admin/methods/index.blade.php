@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('includes.admin.alert')

        <div class="row pt-3">
            <div class="col-lg-9 col-md-8 col-7">
                <h4 class="font-weight-bold">Methods</h4>
            </div>

            <div class="col-lg-3 col-md-4 col-5">
                <a class="btn btn-primary w-100" href="{{ route('methods.create') }}">Create new</a>
            </div>
        </div>

        <div class="row py-3 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Tag</th>
                    <th scope="col">Endpoint</th>
                    <th scope="col">HTTP Method</th>
                    <th scope="col">Description</th>
                    <th scope="col">Return Type</th>
                    <th scope="col" style="width: 20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($methods as $method)
                    <tr>
                        <td>{{ $method->tag->tag }}</td>
                        <td>
                            <a @if($method->visible) href="{{ route('method', $method->formatName()) }}" @endif>
                                {{ $method->name }}
                            </a>
                            @if(!$method->visible) <h4 class="pt-2"><span class="badge badge-pill badge-secondary">Invisible</span></h4> @endif
                        </td>
                        <td><h5 class="pl-1">@include('api.partials.method_type', ['type' => $method->type])</h5></td>
                        <td>{{ $method->description }}</td>
                        <td><a href="{{ route('type', $method->returnType) }}">{{ $method->returnType->name }}</a></td>
                        <td>
                            <a class="btn btn-primary w-100 mt-1" href="{{ route('methods.edit', $method) }}">Edit</a>
                            <form method="post" action="{{ route("methods.destroy", $method) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 mt-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <div class="justify-content-center"> {{ $methods->links() }}</div>
        </div>
    </div>
@endsection
