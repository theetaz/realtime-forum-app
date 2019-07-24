<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')
            ->get();

        return CategoryResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return void
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->all());
        if ($category) {
            $response['data'] = new CategoryResource($category);
            return response()->json($response, Response::HTTP_CREATED);

        } else {
            $response['data'] = "Error occurred while creating the category";
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Category $category)
    {
        $result = $category->update($request->all());
        if ($result) {
            $response['data'] = new CategoryResource($category);
            return response()->json($response, Response::HTTP_CREATED);
        } else {
            $response['data']['message'] = "Error occurred while updating the category";
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
