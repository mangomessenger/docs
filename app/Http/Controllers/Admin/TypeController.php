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
    /**
     * Display a listing of the resource.
     *
     * @param TypeService $typeService
     * @return View
     */
    public function index(TypeService $typeService)
    {
        return View('admin.types.index', [
            'types' => $typeService->all(),
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
     * @param TypeService $typeService
     * @return RedirectResponse
     */
    public function store(TypeRequest $request, TypeService $typeService)
    {
        $typeService->create($request->validated());

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
     * @param TypeService $typeService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TypeRequest $request, TypeService $typeService, int $id)
    {
        $typeService->update($id, $request->validated());

        return redirect()->route('admin.types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeService $typeService
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(TypeService $typeService, int $id)
    {
        $typeService->delete($id);

        return redirect()->back();
    }
}
