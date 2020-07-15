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

    public function find($method, bool $visible = false)
    {
        return $visible ?
            $this->model->visible()->where('name', Method::unformatName($method))->orWhere('id', $method)->firstOrFail() :
            $this->model->where('name', Method::unformatName($method))->orWhere('id', $method)->firstOrFail();
    }

    public function addError(Method $method, Error $error): bool
    {
        if (!$method->errors->contains('id', $error->id)) {
            $method->errors()->attach($error);
            return true;
        }
        return false;
    }

    public function removeError(Method $method, Error $error)
    {
        $method->errors()->detach($error->id);
    }

    public function create(array $input)
    {
        $input['name'] = '/' . ltrim(rtrim($input['name'], '/'), '/');

        return $this->model->create($input);
    }
}
