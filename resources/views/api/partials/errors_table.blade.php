@if ($errors->isNotEmpty())
    <div class="row pt-5 pb-2">
        <h5 class="font-weight-bold">Possible Errors</h5>
    </div>

    <div class="row table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Type</th>
                <th scope="col">Message</th>
            </tr>
            </thead>
            <tbody>
            @foreach($errors as $error)
                <tr>
                    <td>{{ $error->category->code }}</td>
                    <td>{{ $error->type }}</td>
                    <td>{{ $error->message }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
