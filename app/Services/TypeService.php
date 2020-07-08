<?php

namespace App\Services;

use App\Type;

class TypeService extends BaseService
{
    protected $model;

    public function __construct(Type $type)
    {
        $this->model = $type;
    }

    public function find($type)
    {
        return $this->model->where('name', $type)->orWhere('id', $type)->firstOrFail();
    }
}
