<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeParamRequest;
use App\Type;
use App\TypeParam;
use Illuminate\Http\Request;

class TypeParamController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeParamRequest $request, Type $type)
    {
        $typeParam = new TypeParam;
        $typeParam->fill($request->validated());
        $typeParam->ref_type_id = $type->id;
        $typeParam->save();

        return redirect()->route('type.edit', $type);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TypeParam $typeParam
     * @return \Illuminate\Http\Response
     */
    public function show(TypeParam $typeParam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TypeParam $typeParam
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeParam $typeParam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TypeParam $typeParam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeParam $typeParam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TypeParam $typeParam
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeParam $typeParam)
    {
        //
    }
}
