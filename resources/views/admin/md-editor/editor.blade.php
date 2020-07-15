<form method="post" action="{{ $route }}">
    @method('PUT')
    @csrf
    <div class="form-group">
                <textarea class="form-control w-100 @error('description') is-invalid @enderror" name="editor-text"
                          id="{{ $id }}" style="min-width: 100%"
                          rows="4">{{ $value }}</textarea>
    </div>
    @error('editor-text')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn btn-primary w-100">Edit {{ $edit }}</button>
</form>
