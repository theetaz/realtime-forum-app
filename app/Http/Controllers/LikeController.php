<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    /**
     * @param Reply $reply
     * @return JsonResponse
     */
    public function like(Reply $reply)
    {
        //TODO remove hardcoded user id with JWT Auth
        $like = $reply->likes()->create([
            'user_id' => 1,
        ]);

        if ($like) {
            $response['data']['message'] = "Like has been added successfully";
            return response()->json($response, Response::HTTP_CREATED);
        } else {
            $response['data']['message'] = "Something went wrong while adding the like";
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * @param Reply $reply
     * @return JsonResponse
     */
    public function disLike(Reply $reply)
    {
        try {

            //TODO remove hardcoded user id with JWT Auth
            $reply->likes()
                ->where('user_id', 1)
                ->first()
                ->delete();

            $response['data']['message'] = "Like has been removed successfully";
            return response()->json($response, Response::HTTP_OK);

        } catch (Exception $e) {
            $response['data']['message'] = $e->getMessage();
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }
}
