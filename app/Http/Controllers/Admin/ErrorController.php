<?php

namespace App\Http\Controllers\Admin;

use App\Error;
use App\ErrorCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorRequest;
use App\Services\ErrorCategoryService;
use App\Services\ErrorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ErrorController extends Controller
{
    /**
     * Service of Error model
     *
     * @var ErrorService
     */
    protected $errorService;

    /**
     * Service of ErrorCategory model
     *
     * @var ErrorCategoryService
     */
    protected $errorCategoryService;

    /**
     * Create a new controller instance.
     *
     * @param ErrorService $errorService
     * @param ErrorCategoryService $errorCategoryService
     */
    public function __construct(ErrorService $errorService,
                                ErrorCategoryService $errorCategoryService)
    {
        $this->errorService = $errorService;
        $this->errorCategoryService = $errorCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.errors.index', [
            'errors' => $this->errorService->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.errors.create', [
            'errorCategories' => $this->errorCategoryService->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ErrorRequest $request
     * @return RedirectResponse
     */
    public function store(ErrorRequest $request)
    {
        $this->errorService->create($request->validated());

        return redirect()->route('admin.errors.index');
    }

    public function edit(Error $error)
    {
        return View('admin.errors.edit', [
            'error' => $error,
            'errorCategories' => $this->errorCategoryService->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ErrorRequest $request
     * @param Error $error
     * @return RedirectResponse
     */
    public function update(ErrorRequest $request, Error $error)
    {
        $this->errorService->update($error->id, $request->validated());

        return redirect()->route('admin.errors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->errorService->delete($id);

        return redirect()->back();
    }
}
