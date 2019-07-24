<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed slug
 */
class Question extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'user_id'
    ];


    /**
     * @return mixed|string
     */
    public function getRouteKeyName()
    {
       return 'slug';
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return config('constant.api_base_url') .'question/'. $this->slug;
    }
}
