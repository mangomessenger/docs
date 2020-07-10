<?php

namespace App\Services;

use App\Error;

class ErrorService extends BaseService
{
    protected $model;

    public function __construct(Error $error)
    {
        $this->model = $error;
    }

    public function create(array $input)
    {
        $input['type'] = strtoupper($input['type']);

        return $this->model->create($input);
    }

    public function update($id, array $input)
    {
        $input['type'] = strtoupper($input['type']);

        return $this->find($id)->update($input);
    }
}
