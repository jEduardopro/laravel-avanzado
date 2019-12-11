<?php

namespace App\Repositories;

class Repository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all(bool $paginate = false)
    {
        return ($paginate) ? $this->model::paginate() : $this->model::all();
    }
    public function save(array $request, bool $isCommentOrPost = false)
    {
        $this->model->fill($request);
        ($isCommentOrPost) ? $this->model->user_id = auth()->user()->id : null ;
        return $this->model->save();
    }

    public function find($id)
    {
        return $this->model::whereId($id)->first();
    }

    public function update($request, $id)
    {
        $this->model::whereId($id)->first();
        $this->model->fill($request);
        $this->model->update();
    }


}
