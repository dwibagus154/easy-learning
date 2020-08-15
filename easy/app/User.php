<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    protected $primaryKey = 'id';

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
    public function pcomment()
    {
        return $this->hasMany(Pcomment::class);
    }
    public function jcomment()
    {
        return $this->hasMany(Jcomment::class);
    }
    public function reputasi_user()
    {
        return $this->hasMany(Reputasi_User::class);
    }
}
