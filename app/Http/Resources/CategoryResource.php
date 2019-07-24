<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property mixed name
 * @property mixed slug
 * @property mixed path
 * @property mixed created_at
 * @property mixed updated_at
 */
class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'path' => $this->path,
            'create_at' => Carbon::parse($this->created_at)->format('Y-m-d') ?? null,
            'modified_at' => Carbon::parse($this->updated_at)->format('Y-m-d') ?? null,
        ];
    }
}

