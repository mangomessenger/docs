<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TypeRequest;
use App\Services\TypeService;
use App\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TypeController extends Controller
{
    /**
     * Service of Type model
     *
     * @var TypeService
     */
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
            'types' => $this->typeService->paginate(),
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
        $type = $this->typeService->create($request->validated());

        return redirect()->route('admin.types.index')->with('success', "Type {$type->name} was successfully created.");
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

        return redirect()->route('admin.types.index')->with('success', "Type was successfully edited.");
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

        return redirect()->back()->with('success', "Type was successfully deleted.");
    }
}
