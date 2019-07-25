<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property mixed body
 * @property mixed user
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed question
 * @property mixed id
 */
class SingleReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'question' => new QuestionResource($this->question),
            'reply' => [
                'body' => $this->body,
                'id' => $this->id,
                'user' => $this->user->name,
                'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
                'updated_at' => Carbon::parse($this->updated_at)->diffForHumans(),
            ]
        ];
    }
}
