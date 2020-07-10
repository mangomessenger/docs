<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Services\TypeService;
use App\Type;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TypeController extends Controller
{
    protected $typeService;

    /**
     * Create a new controller instance.
     *
     * @param TypeService $typeService
     */
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.types.index', [
            'types' => $this->typeService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeRequest $request
     * @return RedirectResponse
     */
    public function store(TypeRequest $request)
    {
        $this->typeService->create($request->validated());

        return redirect()->route('admin.types');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return View
     */
    public function edit(Type $type)
    {
        return View('admin.types.edit', [
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TypeRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TypeRequest $request, int $id)
    {
        $this->typeService->update($id, $request->validated());

        return redirect()->route('admin.types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->typeService->delete($id);

        return redirect()->back();
    }
}
