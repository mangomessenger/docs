<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodRequest;
use App\Method;
use App\Services\MethodService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param MethodService $methodService
     * @return View
     */
    public function index(MethodService $methodService)
    {
        return View('admin.methods.index', [
            'methods' => $methodService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MethodRequest $request
     * @param MethodService $methodService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MethodRequest $request, MethodService $methodService)
    {
        $methodService->create($request->validated());

        return redirect()->route('admin.methods');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Method $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        return View('admin.methods.edit', [
            'method' => $method,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param MethodService $methodService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MethodRequest $request, MethodService $methodService, int $id)
    {
        $methodService->update($id, $request->validated());

        return redirect()->route('admin.methods');
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
