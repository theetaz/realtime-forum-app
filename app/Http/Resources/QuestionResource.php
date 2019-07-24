<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed title
 * @property mixed slug
 * @property mixed path
 * @property mixed body
 * @property mixed created_at
 * @property mixed updated_at
 */
class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'title' => $this->title,
            'body' => $this->body,
            'slug' => $this->slug,
            'path' => $this->path,
            'category' => $this->category->name ?? null,
            'user' => $this->user->name ?? null,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans() ?? null,
            'modified_at' => Carbon::parse($this->updated_at)->diffForHumans() ?? null,
        ];
    }

}
