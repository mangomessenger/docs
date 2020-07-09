<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodRequest;
use App\Method;
use App\Services\MethodService;
use Illuminate\Http\RedirectResponse;
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
     * @return RedirectResponse
     */
    public function store(MethodRequest $request, MethodService $methodService)
    {
        $methodService->create($request->validated());

        return redirect()->route('admin.methods');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Method $method
     * @return View
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
     * @param MethodRequest $request
     * @param MethodService $methodService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MethodRequest $request, MethodService $methodService, int $id)
    {
        $methodService->update($id, $request->validated());

        return redirect()->route('admin.methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MethodService $methodService
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(MethodService $methodService, int $id)
    {
        $methodService->delete($id);

        return redirect()->back();
    }
}
