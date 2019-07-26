<?php

namespace App\Models;

use App\Helper\GlobalHelper;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Question
 *
 * @property mixed slug
 * @method static create(array $array)
 * @property-read Category $category
 * @property-read string $path
 * @property-read Collection|Reply[] $replies
 * @property-write mixed $title
 * @property-read User $user
 * @method static Builder|Question newModelQuery()
 * @method static Builder|Question newQuery()
 * @method static Builder|Question query()
 * @mixin Eloquent
 * @property int $id
 * @property string $body
 * @property int $category_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Question whereBody($value)
 * @method static Builder|Question whereCategoryId($value)
 * @method static Builder|Question whereCreatedAt($value)
 * @method static Builder|Question whereId($value)
 * @method static Builder|Question whereSlug($value)
 * @method static Builder|Question whereTitle($value)
 * @method static Builder|Question whereUpdatedAt($value)
 * @method static Builder|Question whereUserId($value)
 */
class Question extends Model
{

    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];


    /**
     * @return mixed|string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * @param $title
     */
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = GlobalHelper::generateSlug($title, 'title', $this->getTable());

        //save user id value when creating the question
        $this->attributes['user_id'] = auth()->id();
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
        return url('api') . '/question/' . $this->slug;
    }


}
