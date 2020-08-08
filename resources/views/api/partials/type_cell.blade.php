@if (!is_null($isArray) && $isArray)
    <a href="{{ route('type', 'Array') }}">Array</a>
        <<a href="{{ route('type', $returnType) }}">{{ $returnType->name }}</a>>
@else
    <a href="{{ route('type', $returnType->name) }}">{{ $returnType->name }}</a>
@endif
