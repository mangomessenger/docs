@if ($params->isNotEmpty())
    <div class="row pt-5 pb-2">
        <h5 class="font-weight-bold">Parameters</h5>
    </div>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($params as $param)
                <tr>
                    <td>{{ $param->name }}</td>
                    <td>
                        <a href="{{ route('type', $param->return_type_id) }}">{{ $param->returnType->name }}</a>
                    </td>
                    <td>{{ $param->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
