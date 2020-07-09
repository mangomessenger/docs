<?php

namespace App\Services;

use App\TypeParam;

class TypeParamService extends BaseService
{
    protected $model;

    public function __construct(TypeParam $typeParam)
    {
        $this->model = $typeParam;
    }
}
