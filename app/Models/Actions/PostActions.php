<?php

namespace App\Models\Actions;

use App\Actions\Posts\StoreOrUpdateAction;
use App\Models\Post;

trait PostActions
{
    public static function storeOrUpdate(array $data, Post $post = null): Post
    {
        return (new StoreOrUpdateAction())
            ->setModel($post ?? new Post())
            ->setData($data)
            ->execute()
            ->getModel();
    }
}
