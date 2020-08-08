<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use App\Http\Requests\MethodRequest;
use App\Services\ErrorCategoryService;
use App\Services\MethodService;
use App\Services\MethodTagService;
use App\Services\TypeService;
use Illuminate\View\View;
use Parsedown;

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
     * Service of ErrorCategory model
     *
     * @var ErrorCategoryService
     */
    protected $errorCategoryService;

    /**
     * ApiController constructor.
     *
     * @param TypeService $typeService
     * @param MethodService $methodService
     * @param MethodTagService $methodTagService
     * @param ErrorCategoryService $errorCategoryService
     */
    public function __construct(
        TypeService $typeService,
        MethodService $methodService,
        MethodTagService $methodTagService,
        ErrorCategoryService $errorCategoryService)
    {
        $this->typeService = $typeService;
        $this->methodService = $methodService;
        $this->methodTagService = $methodTagService;
        $this->errorCategoryService = $errorCategoryService;
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
     * @param Parsedown $parsedown
     * @param string $type
     * @param string $method
     * @return View
     */
    public function method(Parsedown $parsedown, string $type, string $method)
    {
        echo 1;
        return View('api.method', [
            'title' => "$method - API Method",
            'method' => $m = $this->methodService->findByType($method, $type),
            'params' => $m->params,
            'errors' => $m->errors->sortBy('code'),
            'payload' => $parsedown->text($m->payload),
            'response' => $parsedown->text($m->response),
            'intermediate' => [
                [
                    'name' => 'Methods',
                    'url' => route('methods'),
                ],
            ]
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
            'methods' => $t->methods,
            'intermediate' => [
                [
                    'name' => 'Types',
                    'url' => route('types'),
                ],
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function errors()
    {
        return View('api.errors', [
            'errorCategories' => $this->errorCategoryService->all()->sortBy('code'),
            'title' => 'Mango Errors',
        ]);
    }
}
