<?php

namespace App\Services;

abstract class BaseService
{
    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input)
    {
        return $this->model->create($input);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * @param $id
     * @param array $input
     * @return mixed
     */
    public function update($id, array $input)
    {
        return $this->find($id)->update($input);
    }

    /**
     * @param int $count
     * @return mixed
     */
    public function paginate(int $count = 20)
    {
        return $this->model->paginate($count);
    }
}
