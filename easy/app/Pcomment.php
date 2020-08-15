<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcomment extends Model
{
    protected $fillable = ['comment', 'user_id', 'question_id'];

    protected $table = 'pcomments';

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
