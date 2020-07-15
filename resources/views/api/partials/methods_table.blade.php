@if($methods->isNotEmpty())
    @if($showLabel ?? true)
    <div class="row pt-5 pb-2">
        <h5 class="font-weight-bold">Methods</h5>
    </div>
    @endif

    <div class="row py-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Endpoint</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($methods as $method)
                <tr>
                    <td><a href="{{ route('method', $method->formatName()) }}">{{ $method->name }}</a></td>
                    <td>{{ $method->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
