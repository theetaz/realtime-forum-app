<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt')
            ->only(['store', 'update', 'destroy']);
    }

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
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
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
        try {
            $category->delete();
            $response['data']['message'] = "Category has been deleted";
            return response()->json($response, Response::HTTP_OK);
        } catch (Exception $e) {

            $response['data']['message'] = $e->getMessage();
            return response($response, Response::HTTP_BAD_REQUEST);
        }
    }
}
