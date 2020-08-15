<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['question', 'description', 'concept', 'isvote', 'user_id'];

    protected $primaryKey = 'id';

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pcomment()
    {
        return $this->hasMany(Pcomment::class);
    }
}
