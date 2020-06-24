<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Method;
use App\MethodTag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('api.api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function methods()
    {
        return View('api.methods', [
            'tags' => MethodTag::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $method
     * @return View
     */
    public function method(string $method)
    {
        return view('api.method', [
            'title' => "$method - API Method",
            'method' => Method::where('name', $method)->firstOrFail(),
        ]);
    }
}
