<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Services\MethodService;
use App\Services\MethodTagService;
use App\Services\TypeService;
use Illuminate\View\View;

class ApiController extends Controller
{
    /**
     * Service of Type model
     *
     * @var TypeService
     */
    protected $typeService;

    /**
     * Service of Method model
     *
     * @var MethodService
     */
    protected $methodService;

    /**
     * Service of MethodTag model
     *
     * @var MethodTagService
     */
    protected $methodTagService;

    /**
     * ApiController constructor.
     *
     * @param TypeService $typeService
     * @param MethodService $methodService
     * @param MethodTagService $methodTagService
     */
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
        return View('api.index', [
            'title' => 'Mango APIs'
        ]);
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
            'title' => 'Mango Methods',
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
            'method' => $m = $this->methodService->find($method),
            'params' => $m->params,
            'errors' => $m->errors,
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
            'title' => 'Mango Types',
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
            'methods' => $t->methods
        ]);
    }
}
