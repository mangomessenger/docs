<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Method;
use App\MethodTag;
use App\Services\TypeService;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('api.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function methods()
    {
        return View('api.methods', [
            'tags' => MethodTag::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $method
     * @return View
     */
    public function method(string $method)
    {
        return View('api.method', [
            'title' => "$method - API Method",
            'method' => Method::where('name', $method)->orWhere('id', $method)->firstOrFail(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param TypeService $typeService
     * @return View
     */
    public function types(TypeService $typeService)
    {
        return View('api.types', [
            'types' => $typeService->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $type
     * @param TypeService $typeService
     * @return View
     */
    public function type(string $type, TypeService $typeService)
    {
        return View('api.type', [
            'title' => "$type - API Type",
            'type' => $t = $typeService->find($type),
            'params' => $t->params,
        ]);
    }
}
