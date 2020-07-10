<?php

namespace App\Http\Controllers\Admin;

use App\ErrorCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorCategoryRequest;
use App\Services\ErrorCategoryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ErrorCategoryController extends Controller
{
    /**
     * Service of ErrorCategory model
     *
     * @var ErrorCategoryService
     */
    protected $errorCategoryService;

    /**
     * Create a new controller instance.
     *
     * @param ErrorCategoryService $errorCategoryService
     */
    public function __construct(ErrorCategoryService $errorCategoryService)
    {
        $this->errorCategoryService = $errorCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.error-categories.index', [
            'categories' => $this->errorCategoryService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.error-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorCategoryRequest $request)
    {
        $this->errorCategoryService->create($request->validated());

        return redirect()->route('admin.error-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ErrorCategory $errorCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ErrorCategory $errorCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ErrorCategory $errorCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ErrorCategory $errorCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ErrorCategory $errorCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrorCategory $errorCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ErrorCategory $errorCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorCategory $errorCategory)
    {
        //
    }
}
