<div class="row py-3">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($methods as $method)
            <tr>
                <td><a href="{{ route('method', $method->name) }}">{{ $method->name }}</a></td>
                <td>{{ $method->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
