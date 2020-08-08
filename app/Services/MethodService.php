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
        return $this
            ->model
            ->where('name', Method::unformatName($method))
            ->orWhere('id', $method)
            ->firstOrFail();
    }

    public function findByType($method, String $type)
    {
        return $this
            ->model
            ->visible()
            ->where(function ($query) use ($method) {
                $query->where('name', Method::unformatName($method));
                $query->orWhere('id', $method);
            })
            ->where('type', strtoupper($type))
            ->firstOrFail();
    }

    public function findVisible($method)
    {
        return $this
            ->model
            ->visible()
            ->where('name', Method::unformatName($method))
            ->orWhere('id', $method)
            ->firstOrFail();
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
