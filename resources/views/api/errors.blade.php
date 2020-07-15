@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="pb-1">
            <div class="row">
                <h4 class="font-weight-bold">Error handling</h4>
            </div>

            <div class="row">
                <p>There will be errors when working with the API, and they must be correctly handled on the client.</p>
            </div>
            <div class="row">
                <p>An error is characterized by several parameters:</p>
            </div>
        </div>

        <div class="pb-1">
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th scope="col">Parameter</th>
                    <th scope="col">Description</th>
                    <th scope="col">Optional</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Type</th>
                    <td>A string literal in the form of /[A-Z_0-9]+/, which summarizes the problem. For example,
                        <code>AUTH_KEY_UNREGISTERED</code>. This is an optional parameter.</td>
                    <td>No</td>
                </tr>
                <tr>
                    <th scope="row">Message</th>
                    <td>A string explaining what gone wrong in the request.</td>
                    <td>No</td>
                </tr>
                <tr>
                    <th scope="row">Errors</th>
                    <td>An array of errors.</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>Numerical value similar to HTTP status. Contains information on the type of error that occurred: for example, a data input error, privacy error, or server error.</td>
                    <td>No</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="pb-5">
            <div class="row">
                <h5 class="font-weight-bold">Example:</h5>
            </div>
            <br/>
            <div class="row bg-gray pl-4">
                <pre><code>
{
    "type": "INVALID_PAYLOAD",
    "message": "The given data was invalid.",
    "errors": { <code class="text-info">//This field is optional, will be returned if at least any field of payload is invalid.</code>
        "phone": [
            "The phone field is required."
        ]
    },
    "status": 422
}</code></pre>
            </div>
        </div>

        @foreach($errorCategories as $category)
            <div class="py-2">
                <div class="row">
                    <h5 class="font-weight-bold">{{ $category->fullName() }}</h5>
                </div>

                <div class="row">
                    <p>{{ $category->description }}</p>
                </div>

                @if($category->errors->isNotEmpty())
                    <h6 class="font-weight-bold">Examples of Errors:</h6>
                    <ui>
                        @foreach($category->errors as $error)
                            <li><code>{{ $error->type }}</code> - {{ $error->message }}</li>
                        @endforeach
                    </ui>
                @endif
            </div>
        @endforeach

        <div class="pb-1">
            <div class="row">
                <h5 class="font-weight-bold">Other Errors</h5>
            </div>

            <div class="row">
                <p>If a server returns an error with a code other than the ones listed above, it will return error with status 500 and error type - <code>UNEXPECTED_ERROR</code>
                </p>
            </div>
        </div>
    </div>
@endsection
