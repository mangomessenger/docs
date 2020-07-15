<?php

namespace App\Http\Controllers\Admin;

use App\Error;
use App\Http\Controllers\Controller;
use App\Http\Requests\MethodRequest;
use App\Method;
use App\Services\ErrorService;
use App\Services\MethodService;
use App\Services\MethodTagService;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MethodController extends Controller
{
    /**
     * Service of Method model
     *
     * @var MethodService
     */
    protected $methodService;

    /**
     * Service of Error model
     *
     * @var ErrorService
     */
    protected $errorService;

    /**
     * Service of MethodTag model
     *
     * @var MethodTagService
     */
    protected $methodTagService;

    /**
     * Service of Type model
     *
     * @var TypeService
     */
    protected $typeService;

    /**
     * Create a new controller instance.
     *
     * @param MethodService $methodService
     * @param ErrorService $errorService
     * @param MethodTagService $methodTagService
     * @param TypeService $typeService
     */
    public function __construct(MethodService $methodService,
                                ErrorService $errorService,
                                MethodTagService $methodTagService,
                                TypeService $typeService)
    {
        $this->methodService = $methodService;
        $this->errorService = $errorService;
        $this->methodTagService = $methodTagService;
        $this->typeService = $typeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return View('admin.methods.index', [
            'methods' => $this->methodService->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return View('admin.methods.create', [
            'types' => $this->typeService->all(),
            'tags' => $this->methodTagService->all(),
            'methodTypes' => Method::$types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MethodRequest $request
     * @return RedirectResponse
     */
    public function store(MethodRequest $request)
    {
        $this->methodService->create($request->validated());

        return redirect()->route('admin.methods.index')->with('success', 'Method was successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Method $method
     * @return View
     */
    public function edit(Method $method)
    {
        return View('admin.methods.edit', [
            'method' => $method,
            'types' => $this->typeService->all(),
            'allErrors' => $this->errorService->all(),
            'tags' => $this->methodTagService->all(),
            'methodTypes' => Method::$types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MethodRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(MethodRequest $request, int $id)
    {
        $this->methodService->update($id, $request->validated());

        return redirect()->back()->with('success', 'Method details were successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->methodService->delete($id);

        return redirect()->back()->with('success', 'Method was successfully deleted.');;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Method $method
     * @return RedirectResponse
     */
    public function addError(Request $request, Method $method)
    {
        $error = $this->errorService->find($request->post('error_id'));
        $result = $this->methodService->addError($method, $error);

        return $result ?
            redirect()->route('methods.edit', $method)->with('success', "Error {$error->type} was successfully added to method.") :
            redirect()->route('methods.edit', $method)->with('error', "Error occurred while adding an {$error->type} error to method.");
    }

    /**
     * Display a listing of the resource.
     *
     * @param Method $method
     * @param Error $error
     * @return RedirectResponse
     */
    public function removeError(Method $method, Error $error)
    {
        $this->methodService->removeError($method, $error);

        return redirect()->route('methods.edit', $method)->with('success', "Error {$error->type} was successfully removed from method.");
    }

    /**
     * Updating payload
     *
     * @param Request $request
     * @param Method $method
     * @return RedirectResponse
     */
    public function updatePayload(Request $request, Method $method)
    {
        $method->update(['payload' => $request->get('editor-text')]);

        return redirect()->route('methods.edit', $method)->with('success', 'Method\'s payload was successfully updated.');
    }

    /**
     * Updating payload
     *
     * @param Request $request
     * @param Method $method
     * @return RedirectResponse
     */
    public function updateResponse(Request $request, Method $method)
    {
        $method->update(['response' => $request->get('editor-text')]);

        return redirect()->route('methods.edit', $method)->with('success', 'Method\'s response was successfully updated.');
    }

    /**
     * Updating payload
     *
     * @param Request $request
     * @param Method $method
     * @return RedirectResponse
     */
    public function changeVisibility(Request $request, Method $method)
    {
        $method->update(['visible' => !$method->visible]);

        return redirect()->route('methods.edit', $method)->with('success', "Method visibility was successfully changed.");
    }
}
