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

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input)
    {
        return $this->model->create(array_merge($input, [
            'is_required' => isset($input['required']),
            'is_array' => isset($input['array']),
        ]));
    }
}
