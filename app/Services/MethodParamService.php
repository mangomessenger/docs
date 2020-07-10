<?php

namespace App\Services;

use App\MethodParam;

class MethodParamService extends BaseService
{
    protected $model;

    public function __construct(MethodParam $methodParam)
    {
        $this->model = $methodParam;
    }
}
