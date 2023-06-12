<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use Illuminate\Support\Facades\Validator;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $policies =  Policy::paginate(10);
        return response()->json([
            'status'=>'success',
            'result'=>$policies
        ]);
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
        //
        $rules = array(
            "name"=>"required",
            "content"=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                    //code...
                $post = new Policy;
                $post->name = $request->name;
                $post->content = $request->content;
                $post->status = 0;
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
            $policy = Policy::find($id);

            return response()->json([
                'status'=>'success',
                'result'=>$policy
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
            "name"=>"required",
            "content"=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                    //code...
                $post = Policy::find($id);
                $post->name = $request->name;
                $post->content = $request->content;
                $post->status = 0;
                $result = $post->save();
                if ($result) {
                    return [
                        "result" => "Data has been update !"
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
            $policy = Policy::find($id)->delete();
            return response()->json([
                'status'=>'success',
                'result'=>$policy
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
