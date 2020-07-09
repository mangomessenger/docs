<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodRequest;
use App\Method;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.methods.index', [
            'methods' => Method::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MethodRequest $request)
    {
        Method::create($request->validated());

        return redirect()->route('admin.methods');
    }

    /**
     * Display the specified resource.
     *
     * @param string $method
     * @return View
     */
    public function show(string $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Method $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Method $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Method $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        //
    }
}
