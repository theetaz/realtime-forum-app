<?php

namespace App\Models;

use App\Helper\GlobalHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed slug
 * @method static create(array $all)
 */
class Category extends Model
{
    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = GlobalHelper::generateSlug($name, 'name', $this->getTable());
    }


    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return url('api') .'/category/'. $this->slug;
    }

}
