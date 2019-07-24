<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed title
 * @property mixed slug
 * @property mixed path
 * @property mixed body
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
        ];
    }

}
