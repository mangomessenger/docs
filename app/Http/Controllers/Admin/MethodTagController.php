<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodTagRequest;
use App\MethodTag;
use App\Services\MethodTagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MethodTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param MethodTagService $methodTagService
     * @return View
     */
    public function index(MethodTagService $methodTagService)
    {
        return View('admin.method-tags.index', [
            'tags' => $methodTagService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.method-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MethodTagRequest $request
     * @param MethodTagService $methodTagService
     * @return RedirectResponse
     */
    public function store(MethodTagRequest $request, MethodTagService $methodTagService)
    {
        $methodTagService->create($request->validated());

        return redirect()->route('admin.method-tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MethodTag $tag
     * @return View
     */
    public function edit(MethodTag $tag)
    {
        return View('admin.method-tags.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MethodTagRequest $request
     * @param MethodTagService $methodTagService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MethodTagRequest $request, MethodTagService $methodTagService, int $id)
    {
        $methodTagService->update($id, $request->validated());

        return redirect()->route('admin.method-tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
