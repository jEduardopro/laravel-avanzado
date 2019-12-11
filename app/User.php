<?php

namespace App;

use App\Notifications\SendEmailForResetPassword;
use App\Notifications\SendEmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SendEmailForResetPassword($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendEmailVerification());
    }


    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function canJoinRoom($id)
    {
        return in_array($id, [1,2]);
    }
}
