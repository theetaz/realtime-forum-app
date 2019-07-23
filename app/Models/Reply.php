<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $fillable = [
        'body',
        'question_id',
        'user_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
