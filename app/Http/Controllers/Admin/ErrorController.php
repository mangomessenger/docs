<?php

namespace App\Http\Controllers\Admin;

use App\Error;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorRequest;
use App\Services\ErrorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * Create a new controller instance.
     *
     * @param ErrorService $errorService
     */
    public function __construct(ErrorService $errorService)
    {
        $this->errorService = $errorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.errors.index', [
            'errors' => $this->errorService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.errors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(ErrorRequest $request)
    {
        $this->errorService->create($request->validated());

        return redirect()->route('admin.errors');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function show(Error $error)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function edit(Error $error)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Error $error)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Error $error
     * @return \Illuminate\Http\Response
     */
    public function destroy(Error $error)
    {
        //
    }
}
