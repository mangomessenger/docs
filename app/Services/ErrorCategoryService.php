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
}
