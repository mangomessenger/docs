<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MethodTagRequest;
use App\MethodTag;
use App\Services\MethodTagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MethodTagController extends Controller
{
    /**
     * Service of MethodTag model
     *
     * @var MethodTagService
     */
    protected $methodTagService;

    /**
     * Create a new controller instance.
     *
     * @param MethodTagService $methodTagService
     */
    public function __construct(MethodTagService $methodTagService)
    {
        $this->methodTagService = $methodTagService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param MethodTagService $methodTagService
     * @return View
     */
    public function index(MethodTagService $methodTagService)
    {
        return View('admin.methods.tags.index', [
            'tags' => $methodTagService->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.methods.tags.create');
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

        return redirect()->route('admin.methods.tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MethodTag $tag
     * @return View
     */
    public function edit(MethodTag $tag)
    {
        return View('admin.methods.tags.edit', [
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

        return redirect()->route('admin.methods.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MethodTagService $methodTagService
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(MethodTagService $methodTagService, int $id)
    {
        $methodTagService->delete($id);

        return redirect()->back();
    }
}
