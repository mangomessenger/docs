<?php

namespace App\Services;

use App\Error;
use App\Method;

class MethodService extends BaseService
{
    protected $model;

    public function __construct(Method $method)
    {
        $this->model = $method;
    }

    public function find($method)
    {
        return $this->model->where('name', $method)->orWhere('id', $method)->firstOrFail();
    }

    public function addError(Method $method, Error $error)
    {
        if (!$method->errors->contains('id', $error->id)) {
            $method->errors()->attach($error);
        }
    }

    public function removeError(Method $method, Error $error)
    {
        $method->errors()->detach($error->id);
    }
}
