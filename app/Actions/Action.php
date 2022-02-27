<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

abstract class Action
{
    protected Model $model;
    protected array $data;

    public function setModel(Model $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    abstract public function execute(): self;
}
