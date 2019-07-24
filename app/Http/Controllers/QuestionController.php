<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $questions = Question::with(['category', 'user'])
            ->orderBy('updated_at', 'DESC')
            ->get();
        return QuestionResource::collection($questions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateQuestionRequest $request
     * @return ResponseFactory|Response
     */
    public function store(CreateQuestionRequest $request)
    {
        //append slug to the request
        $question = Question::create($request->all());
        if ($question) {
            $response['data'] = new QuestionResource($question);
            return response()->json($response, Response::HTTP_CREATED);

        } else {
            $response['data'] = "Error occurred while creating the question";
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return QuestionResource
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateQuestionRequest $request
     * @param Question $question
     * @return void
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $result = $question->update($request->all());
        if ($result) {
            $response['data'] = new QuestionResource($question);
            return response()->json($response, Response::HTTP_CREATED);
        } else {
            $response['data']['message'] = "Error occurred while updating the question";
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return Response
     * @throws Exception
     */
    public function destroy(Question $question)
    {
        try {
            $question->delete();
            $response['data']['message'] = "Question has been deleted";
            return response()->json($response, Response::HTTP_OK);

        } catch (Exception $e) {
            $response['data']['message'] = $e->getMessage();
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }
}
