<?php

namespace App\Traits;

trait RepositoryTrait
{
    /**
     * Get all the data
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get Model by id
     *
     * @param int $id
     * @return App\Model
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get all data by paginate and sort
     *
     * @param  int  $direction
     * @param  string  $column
     * @param  string  $direction
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function page($perPage = null, $column = 'created_at', $direction = 'asc')
    {
        $builder = $this->model->orderBy($column, $direction);

        return $perPage ? $builder->paginate($perPage) : $builder->paginate();
    }

    /**
     * Save the data to the model
     *
     * @param  array  $attributes
     * @return Model
     */
    public function store(array $attributes = [])
    {
        return $this->save($this->model, $attributes);
    }

    /**
     * Update the data to the model
     *
     * @param  int $id
     * @param  array  $attributes
     * @return Model
     */
    public function update($id, array $attributes = [])
    {
        $this->model = $this->getById($id);

        return $this->save($this->model, $attributes);
    }

    /**
     * Save the data to the model
     *
     * @param  Model $model
     * @param  array  $attributes
     * @return Model
     */
    public function save($model, array $attributes = [])
    {
        $model->fill($attributes);

        $model->save();

        return $model;
    }
}
