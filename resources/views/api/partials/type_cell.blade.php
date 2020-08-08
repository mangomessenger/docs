@if (!is_null($isArray) && $isArray)
    <a href="{{ route('type', 'Array') }}">Array</a>
        <<a href="{{ route('type', $param->returnType->name) }}">{{ $param->returnType->name }}</a>>
@else
    <a href="{{ route('type', $param->returnType->name) }}">{{ $param->returnType->name }}</a>
@endif
