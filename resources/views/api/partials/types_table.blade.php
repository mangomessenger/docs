<div class="row py-3 table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <td><a href="{{ route('type', $type->name) }}">{{ $type->name }}</a></td>
                <td>{{ $type->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
