<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jcomment extends Model
{
    protected $fillable = ['comment', 'user_id', 'answer_id'];

    protected $table = 'jcomments';

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
