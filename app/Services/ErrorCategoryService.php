<?php

namespace App\Services;

use App\ErrorCategory;

class ErrorCategoryService extends BaseService
{
    protected $model;

    public function __construct(ErrorCategory $errorCategory)
    {
        $this->model = $errorCategory;
    }

    public function create(array $input)
    {
        $input['name'] = strtoupper($input['name']);

        return $this->model->create($input);
    }

    public function update($id, array $input)
    {
        $input['name'] = strtoupper($input['name']);

        return $this->find($id)->update($input);
    }
}
