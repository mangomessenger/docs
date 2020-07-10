<?php

namespace App\Services;

use App\MethodTag;

class MethodTagService extends BaseService
{
    protected $model;

    public function __construct(MethodTag $type)
    {
        $this->model = $type;
    }

    public function create(array $input)
    {
        $input['tag'] = strtolower($input['tag']);

        return $this->model->create($input);
    }

    public function update($id, array $input)
    {
        $input['tag'] = strtolower($input['tag']);

        return $this->find($id)->update($input);
    }
}
