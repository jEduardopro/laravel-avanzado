<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Repository;

class PostRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Post());
    }

    public function myPosts(bool $paginate = false)
    {
        return ($paginate) ? $this->model::whereUserId(auth()->user()->id)->paginate() : $this->model::whereUserId(auth()->user()->id)->get();
    }
}
