@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post" action="{{ $route }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>{{ $edit }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="editor-text"
                                  id="editor"
                                  rows="4">{{ $value }}</textarea>
                    </div>
                    @error('editor-text')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary w-100">Edit {{ $edit }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("editor"),
            hideIcons: [
                "guide",
                "bold",
                'table',
                'fullscreen',
                'side-by-side',
                'generic-list',
                'unordered-list',
                'ordered-list',
                'image',
                'italic',
                'quote',
                'link',
                'heading',
            ],
            showIcons: ["code"],
            tabSize: 4
        });
    </script>
@endsection
