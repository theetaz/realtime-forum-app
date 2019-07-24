<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReplyRequest;
use App\Http\Resources\ReplyResource;
use App\Http\Resources\SingleReplyResource;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, CreateReplyRequest $request)
    {
        $result = $question->replies()->create($request->all());
        dd($result);

        //append slug to the request
//        $question = Question::create($request->all());
//        if ($question) {
//            $response['data'] = new QuestionResource($question);
//            return response()->json($response, Response::HTTP_CREATED);
//
//        } else {
//            $response['data'] = "Error occurred while creating the question";
//            return response($response, Response::HTTP_BAD_REQUEST);
//        }
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
     * @param  \Illuminate\Http\Request  $request
     * @param Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
