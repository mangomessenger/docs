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
     * Service of Method model
     *
     * @var MethodService
     */
    protected $methodService;

    /**
     * Create a new controller instance.
     *
     * @param MethodService $methodService
     */
    public function __construct(MethodService $methodService)
    {
        $this->methodService = $methodService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.methods.index', [
            'methods' => $this->methodService->all(),
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
     * @return RedirectResponse
     */
    public function store(MethodRequest $request)
    {
        $this->methodService->create($request->validated());

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
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MethodRequest $request, int $id)
    {
        $this->methodService->update($id, $request->validated());

        return redirect()->route('admin.methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->methodService->delete($id);

        return redirect()->back();
    }
}
