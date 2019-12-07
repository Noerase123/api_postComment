<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\ArraySerializer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostModel;
use App\Http\Requests\StorePostRequest;
use App\Transformers\Post\PostTransformer;

class PostController extends Controller
{
    // public function __construct() 
    // {

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = PostModel::all();

        return response()->json([
            'data' => $all
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req,[
            'title' => 'required',
            'description' => 'required|min:10'
        ]);

        $post = new PostModel;

        $post->title = $req->title;
        $post->description = $req->description;
        $post->save();

        return response()->json([
            'message' => 'post added'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = PostModel::find($id);

        if (is_null($model)) {
            return response()->json([
                'data' => 'Not found'
            ],404);
        }
        else {
            return response()->json([
                'data' => $model
            ],200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = $this->model->where('id', $id)->first();

        if (is_null($res)) {
            return response()->json([
                'message' => 'Not found'
            ],404);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        $res->update($data);

        return response()->json([
            'message' => 'post updated'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostModel::destroy($id);

        return response()->json([
            'message' => 'post deleted'
        ],200);
    }
}
