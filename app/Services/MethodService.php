<?php

namespace App\Services;

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
}
