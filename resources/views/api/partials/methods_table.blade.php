@if($methods->isNotEmpty())
    @if($showLabel ?? true)
    <div class="row pt-5 pb-2">
        <h5 class="font-weight-bold">Methods</h5>
    </div>
    @endif

    <div class="row py-3 table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Endpoint</th>
                <th scope="col">Description</th>
                <th scope="col" style="width: 15%" class="text-center">HTTP Method</th>
            </tr>
            </thead>
            <tbody>
            @foreach($methods as $method)
                <tr>
                    <td><a href="{{ route('method', ['type' => strtolower($method->type), 'method' => $method->formatName()]) }}">{{ $method->name }}</a></td>
                    <td>{{ $method->description }}</td>
                    <td class="text-center"><h5 class="pl-1">@include('api.partials.method_type', ['type' => $method->type])</h5></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
