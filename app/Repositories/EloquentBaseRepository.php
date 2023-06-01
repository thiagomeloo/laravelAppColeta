<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseRepository implements RepositoryInterface
{

    protected Model $model;

    /**
     * EloquentORM constructor.
     * @param Model $model
     */
    public function __construct()
    {
        $model = $this->modelClass();
        $this->model = new $model;
    }

    /**
     * Return model class name.
     * @return string
     */
    abstract function modelClass(): string;

    /**
     * Return all data from model
     * @return array
     */
    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    /**
     * Create new data
     * @param array $data
     * @return object
     */
    public function create(array $data): object
    {
        return (object) $this->model->create($data)->toArray();
    }

    /**
     * Update data
     * @param array $data
     * @param int $id
     * @return object|bool
     */
    public function update(array $data, int $id): object|bool
    {
        $object = $this->model->find($id);

        if ($object) {
            $object->update($data);
            return (object) $object->toArray();
        }

        return false;
    }

    /**
     * Delete data
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->delete($id);
    }

    /**
     * Find data
     * @param int $id
     * @return object|bool
     */
    public function find(int $id): object|bool
    {
        return (object) $this->model->find($id)->toArray();
    }
}
