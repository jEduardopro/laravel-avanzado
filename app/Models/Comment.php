<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'post_id', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


}
