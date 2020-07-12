<?php

namespace App\Http\Controllers\Admin;

use App\ErrorCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorCategoryRequest;
use App\Services\ErrorCategoryService;
use Illuminate\Http\RedirectResponse;
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
        return View('admin.errors.categories.index', [
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
        return View('admin.errors.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(ErrorCategoryRequest $request)
    {
        $this->errorCategoryService->create($request->validated());

        return redirect()->route('admin.errors.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->errorCategoryService->delete($id);

        return redirect()->back();
    }
}
