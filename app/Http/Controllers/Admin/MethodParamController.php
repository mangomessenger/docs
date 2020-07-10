<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodParamRequest;
use App\Method;
use App\MethodParam;
use App\Services\MethodParamService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MethodParamController extends Controller
{
    /**
     * Service of MethodParam model
     *
     * @var MethodParamService
     */
    protected $methodParamService;

    /**
     * Create a new controller instance.
     *
     * @param MethodParamService $methodParamService
     */
    public function __construct(MethodParamService $methodParamService)
    {
        $this->methodParamService = $methodParamService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Method $method
     * @return View
     */
    public function create(Method $method)
    {
        return View('admin.method-params.create', [
            'method' => $method,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MethodParamRequest $request
     * @param Method $method
     * @return RedirectResponse
     */
    public function store(MethodParamRequest $request, Method $method)
    {
        $this->methodParamService->create($request->validated());

        return redirect()->route('method.edit', $method);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MethodParam $methodParam
     * @return View
     */
    public function edit(MethodParam $methodParam)
    {
        return View('admin.method-params.edit',[
            'methodParam' => $methodParam,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MethodParamRequest $request
     * @param MethodParam $methodParam
     * @return RedirectResponse
     */
    public function update(MethodParamRequest $request, MethodParam $methodParam)
    {
        $this->methodParamService->update($methodParam->id, $request->validated());

        return redirect()->route('method.edit', $methodParam->method_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->methodParamService->delete($id);

        return redirect()->back();
    }
}
