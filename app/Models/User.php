<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ClientResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'type'
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

    public function profiles()
    {
        return $this->belongsToMany('App\Models\Profile', 'user_profile')
        ->withPivot('value')
        ->withTimestamps();
    }

     /**
     * Send the password reset notification client.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\Product', 'likes', 'user_id', 'post_id');
    }

    public function reviews()
    {
        return $this->belongsToMany('App\Models\Product', 'reviews')
            ->withPivot(['content', 'rate'])
            ->withTimestamps();
    }
}
