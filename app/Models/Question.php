<?php

namespace App\Models;

use App\Helper\GlobalHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed slug
 * @method static create(array $array)
 */
class Question extends Model
{

    protected $fillable = [
        'title',
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


    public function setTitleAttribute($title)
    {
       $this->attributes['title'] = $title;
       $this->attributes['slug'] = GlobalHelper::generateSlug($title, $this->getTable());
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
        return url('api') .'/question/'. $this->slug;
    }
}
