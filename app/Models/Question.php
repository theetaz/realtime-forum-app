<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
