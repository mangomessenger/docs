<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TypeParamRequest;
use App\Services\TypeParamService;
use App\Services\TypeService;
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
     * Service of Type model
     *
     * @var TypeService
     */
    protected $typeService;

    /**
     * Create a new controller instance.
     *
     * @param TypeParamService $typeParamService
     * @param TypeService $typeService
     */
    public function __construct(TypeParamService $typeParamService,
                                TypeService $typeService)
    {
        $this->typeParamService = $typeParamService;
        $this->typeService = $typeService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Type $type
     * @return View
     */
    public function create(Type $type)
    {
        return View('admin.types.params.create', [
            'type' => $type,
            'types' => $this->typeService->all(),
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

        return redirect()->route('types.edit', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeParam $typeParam
     * @return View
     */
    public function edit(TypeParam $typeParam)
    {
        return View('admin.types.params.edit', [
            'typeParam' => $typeParam,
            'types' => $this->typeService->all(),
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

        return redirect()->route('types.edit', $typeParam->type_id);
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
