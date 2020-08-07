<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MethodParamRequest;
use App\Method;
use App\MethodParam;
use App\Services\MethodParamService;
use App\Services\TypeService;
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
     * Service of Type model
     *
     * @var TypeService
     */
    protected $typeService;

    /**
     * Create a new controller instance.
     *
     * @param MethodParamService $methodParamService
     */
    public function __construct(MethodParamService $methodParamService, TypeService $typeService)
    {
        $this->methodParamService = $methodParamService;
        $this->typeService = $typeService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Method $method
     * @return View
     */
    public function create(Method $method)
    {
        return View('admin.methods.params.create', [
            'method' => $method,
            'types' => $this->typeService->all(),
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
        $methodParam = $this->methodParamService->create($request->validated());

        return redirect()->route('methods.edit', $method)->with('success', "Method parameter {$methodParam->name} was successfully created.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MethodParam $methodParam
     * @return View
     */
    public function edit(MethodParam $methodParam)
    {
        return View('admin.methods.params.edit',[
            'methodParam' => $methodParam,
            'types' => $this->typeService->all(),
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

        return redirect()->route('methods.edit', $methodParam->method_id)->with('success', "Method parameter {$methodParam->name} was successfully edited.");
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

        return redirect()->back()->with('success', "Method parameter was successfully deleted.");
    }
}
