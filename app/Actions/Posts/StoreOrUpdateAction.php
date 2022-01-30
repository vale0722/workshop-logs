<?php

namespace App\Actions\Posts;

use App\Actions\Action;
use Illuminate\Support\Arr;

class StoreOrUpdateAction extends Action
{
    public function execute(): Action
    {
        $this->model->title = Arr::get($this->data, 'title');
        $this->model->content = Arr::get($this->data, 'content');
        $this->model->user_id = auth()->id();
        $this->model->save();

        return $this;
    }
}
