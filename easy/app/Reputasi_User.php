<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reputasi_User extends Model
{
    protected $fillable = ['point', 'user_id'];

    protected $table = 'reputasi_users';

    protected $primarykey = "id";

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
