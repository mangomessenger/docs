<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeParamRequest;
use App\Type;
use App\TypeParam;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TypeParamController extends Controller
{
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
        $data = $request->validated();
        $data['ref_type_id'] = $type->id;
        TypeParam::create($data);

        return redirect()->route('type.edit', $type);
    }

    /**
     * Display the specified resource.
     *
     * @param TypeParam $typeParam
     * @return void
     */
    public function show(TypeParam $typeParam)
    {
        //
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
        $typeParam->update($request->validated());

        return redirect()->route('type.edit', $typeParam->ref_type_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeParam $typeParam
     * @return RedirectResponse
     */
    public function destroy(TypeParam $typeParam)
    {
        $typeParam->delete();
        return redirect()->back();
    }
}
