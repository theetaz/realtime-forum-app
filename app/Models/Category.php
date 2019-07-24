<?php

namespace App\Models;

use App\Helper\GlobalHelper;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['slug'] = GlobalHelper::generateSlug($name, $this->getTable());
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

}
