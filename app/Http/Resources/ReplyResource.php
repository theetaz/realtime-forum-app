<?php

namespace App\Http\Resources;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property mixed replies
 */
class ReplyResource extends JsonResource
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
            'question' => new QuestionResource($this),
            'replies' => $this->replies->map(function (Reply $reply) {
                $data = array();
                $data['body'] = $reply->body;
                $data['reply_id'] = $reply->id;
                $data['created_at'] = Carbon::parse($reply->created_at)->diffForHumans();
                $data['modified_at'] = Carbon::parse($reply->updated_at)->diffForHumans();

                return $data;
            })
        ];
    }
}
