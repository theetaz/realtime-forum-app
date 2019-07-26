<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Http\Resources\ReplyResource;
use App\Http\Resources\SingleReplyResource;
use App\Models\Question;
use App\Models\Reply;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt')
            ->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Question $question
     * @return ReplyResource
     */
    public function index(Question $question)
    {
        return new ReplyResource($question);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param CreateReplyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, CreateReplyRequest $request)
    {
        $reply = $question->replies()->create($request->all());

        if ($reply) {
            $response['data'] = new SingleReplyResource($reply);
            return response()->json($response, Response::HTTP_CREATED);

        } else {
            $response['data'] = "Error occurred while creating the reply";
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Reply $reply
     * @return SingleReplyResource
     */
    public function show(Reply $reply)
    {
        return new SingleReplyResource($reply);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReplyRequest $request
     * @param Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        $result = $reply->update($request->all());

        if ($result) {
            $response['data'] = new SingleReplyResource($reply);
            return response()->json($response, Response::HTTP_CREATED);

        } else {
            $response['data'] = "Error occurred while updating the reply";
            return response($response, Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        try {
            $reply->delete();
            $response['data']['message'] = "Reply has been deleted";
            return response()->json($response, Response::HTTP_OK);

        } catch (Exception $e) {
            $response['data']['message'] = $e->getMessage();
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }
}
