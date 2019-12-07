<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use App\Models\PostModel;
use DB;
class CommentController extends Controller
{
    public function __construct(CommentModel $comm, PostModel $post)
    {
        $this->comm = $comm;
        $this->post = $post;
    }

    public function viewComments($postid)
    {
        $post = $this->post->find($postid);

        if (is_null($post)) {
            return response()->json([
                'message' => 'No Post Found'
            ],404);
        }

        $getComm = $this->comm->where('post_id',$postid)->get();

        return response()->json([
            'get_data' => $getComm
        ],200);
    }

    public function viewAllComments() 
    {
        $comm = $this->comm->all();
        return response()->json([
            'data of comments' => $comm
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request,$postid)
    {
        $this->validate($request,[
            'comment' => 'required'
        ]);

        $post = $this->post->find($postid);

        if (!$post) {
            return response()->json([
                'message' => 'Post Not found'
            ],404);
        } else {

            $this->comm->comment = $request->comment;
            $this->comm->post_id = $postid;
            $this->comm->save();

            return response()->json([
                'message' => 'comment added to '.$postid
            ],201);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
