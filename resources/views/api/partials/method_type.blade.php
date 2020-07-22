@if (isset($type))
    @switch($type)
        @case('GET')
        <span class="badge badge-pill badge-success">{{ $method->type }}</span>
        @break

        @case('POST')
        <span class="badge badge-pill badge-primary">{{ $method->type }}</span>

        @break

        @case('PUT')
        <span class="badge badge-pill badge-info">{{ $method->type }}</span>
        @break

        @case('DELETE')
        <span class="badge badge-pill badge-danger">{{ $method->type }}</span>
        @break

        @default
        <span class="badge badge-pill badge-secondary">{{ $method->type }}</span>
    @endswitch
@endif
