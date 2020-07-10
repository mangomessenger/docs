<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Method;
use App\MethodTag;
use App\Services\MethodService;
use App\Services\MethodTagService;
use App\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ApiController extends Controller
{
    protected $typeService;
    protected $methodService;
    protected $methodTagService;

    public function __construct(TypeService $typeService,
                                MethodService $methodService,
                                MethodTagService $methodTagService)
    {
        $this->typeService = $typeService;
        $this->methodService = $methodService;
        $this->methodTagService = $methodTagService;
    }

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
            'tags' => $this->methodTagService->all(),
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
            'method' => $this->methodService->find($method),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function types()
    {
        return View('api.types', [
            'types' => $this->typeService->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $type
     * @return View
     */
    public function type(string $type)
    {
        return View('api.type', [
            'title' => "$type - API Type",
            'type' => $t = $this->typeService->find($type),
            'params' => $t->params,
        ]);
    }
}
