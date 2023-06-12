<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Post::paginate(10);

        return response()->json([
            'status'=>'OK',
            'result'=>$list
        ]);
    }
    public function getByUserId($user_id){

        try {
            //code...
            $posts = Post::where('user_id',$user_id)->get();
            return response()->json([
                'status'=>'success',
                'resutl'=>$posts
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>'error',
                'error'=>$th
            ]);
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        //
        $rules = array(
            "content"=>"required",
            "title"=>"required",
            "user_id"=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                    //code...
                    $post = new Post;
                $post->title = $request->title;
                $post->content = $request->content;
                $post->user_id = $request->user_id;
                $result = $post->save();
                if ($result) {
                    return [
                        "result" => "Data has been save !"
                    ];
                } else {
                    return [
                        "result" => "Operation Failed !"
                    ];
                }
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json([
                    'status'=>'error',
                    'error'=>$th
                ]);
            }
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            //code...
            $post = Post::find($id);
            return response()->json([
                'status'=>'success',
                'resutl'=>$post
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>'error',
                'error'=>$th
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $rules = array(
            "content"=>"required",
            "title"=>"required",
            "user_id"=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                    //code...
                $post = Post::find($id);
                $post->title = $request->title;
                $post->content = $request->content;
                $post->user_id = $request->user_id;
                $result = $post->save();
                if ($result) {
                    return [
                        "status"=>"success",
                        "result" => "Data has been update !"
                    ];
                } else {
                    return [
                        "status"=>"error",
                        "result" => "Operation Failed !"
                    ];
                }
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json([
                    'status'=>'error',
                    'error'=>$th
                ]);
            }
            
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
        //
        try {
            //code...
            $post = Post::find($id)->delete();
            return response()->json([
                'status'=>'success',
                'result'=>$post
            ]);
            
           
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>'error',
                'error'=>$th
            ]);
        }

    }
}
