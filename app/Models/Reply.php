<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reply
 *
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed body
 * @property mixed slug
 * @property mixed id
 * @property-read Collection|Like[] $likes
 * @property-read Question $question
 * @property-read User $user
 * @method static Builder|Reply newModelQuery()
 * @method static Builder|Reply newQuery()
 * @method static Builder|Reply query()
 * @mixin Eloquent
 * @property int $question_id
 * @property int $user_id
 * @method static Builder|Reply whereBody($value)
 * @method static Builder|Reply whereCreatedAt($value)
 * @method static Builder|Reply whereId($value)
 * @method static Builder|Reply whereQuestionId($value)
 * @method static Builder|Reply whereUpdatedAt($value)
 * @method static Builder|Reply whereUserId($value)
 */
class Reply extends Model
{

    protected $fillable = [
        'body',
        'question_id',
    ];

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = $value;
        $this->attributes['user_id'] = auth()->id();
    }

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
