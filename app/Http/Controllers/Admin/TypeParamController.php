<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeParamRequest;
use App\Services\TypeParamService;
use App\Type;
use App\TypeParam;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TypeParamController extends Controller
{
    /**
     * Service of TypeParam model
     *
     * @var TypeParamService
     */
    protected $typeParamService;

    /**
     * Create a new controller instance.
     *
     * @param TypeParamService $typeParamService
     */
    public function __construct(TypeParamService $typeParamService)
    {
        $this->typeParamService = $typeParamService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Type $type
     * @return View
     */
    public function create(Type $type)
    {
        return View('admin.type-params.create', [
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeParamRequest $request
     * @param Type $type
     * @return RedirectResponse
     */
    public function store(TypeParamRequest $request, Type $type)
    {
        $this->typeParamService->create($request->validated());

        return redirect()->route('type.edit', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeParam $typeParam
     * @return View
     */
    public function edit(TypeParam $typeParam)
    {
        return View('admin.type-params.edit', [
            'typeParam' => $typeParam,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TypeParamRequest $request
     * @param TypeParam $typeParam
     * @return RedirectResponse
     */
    public function update(TypeParamRequest $request, TypeParam $typeParam)
    {
        $this->typeParamService->update($typeParam->id, $request->validated());

        return redirect()->route('type.edit', $typeParam->type_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->typeParamService->delete($id);

        return redirect()->back();
    }
}
