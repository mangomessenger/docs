@if ($params->isNotEmpty())
    <div class="row pt-5 pb-2">
        <h5 class="font-weight-bold">Parameters</h5>
    </div>

    <div class="row table-responsive">
        <table class="table">
            @php $required = $params->where('is_required', 1); @endphp
            @php $optional = $params->where('is_required', ''); @endphp

            @if ($required->isNotEmpty())
                <tr class="mango-back text-white">
                    <th scope="col">Required</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                </tr>
                <tbody>
                @endif
                @foreach($required as $param)
                    <tr>
                        <td>{{ $param->name }}</td>
                        <td>
                            @include('api.partials.type_cell', ['isArray' => $param->isArray(), 'returnType' => $param->returnType])
                        </td>
                        <td>{{ $param->description }}</td>
                    </tr>
                @endforeach

                @if ($optional->isNotEmpty())
                    <tr class="mango-back text-white">
                        <th scope="col">Optional</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                    </tr>
                <tbody>
                @endif
                @foreach($optional as $param)
                    @if (!$param->is_required)
                        <tr>
                            <td>{{ $param->name }}</td>
                            <td>
                                <a href="{{ route('type', $param->returnType->name) }}">{{ $param->returnType->name }}</a>
                            </td>
                            <td>{{ $param->description }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
        </table>
    </div>
@endif
