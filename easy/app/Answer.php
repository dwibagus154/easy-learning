<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer', 'isvote', 'user_id', 'question_id'];

    protected $table = 'answers';

    protected $primarykey = "id";

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function jcomment()
    {
        return $this->hasMany(Jcomment::class);
    }
}
