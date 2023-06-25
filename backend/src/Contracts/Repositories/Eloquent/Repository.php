<?php

namespace Base\Contracts\Repositories\Eloquent;

use Illuminate\Container\Container;

abstract class Repository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Container $container)
    {
        $this->model = $container->make($this->model());
    }

    protected abstract function model(): string;

    protected function applyWith(array $relations = [])
    {
        return ! empty($relations) ? $this->model->with($relations) : $this->model;
    }
}
