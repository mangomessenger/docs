<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodTagRequest;
use App\Services\MethodTagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param MethodTagService $methodTagService
     * @return View
     */
    public function index(MethodTagService $methodTagService)
    {
        return View('admin.tags.index', [
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
        return View('admin.tags.create');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
