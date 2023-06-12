<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UploadImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all image
        $list = Image::paginate(10);
         return response()->json([
            'status' => 'success',
            'result'=> $list
         ]);
    }
    public function getImageByProductId($id)
    {
        //the default is value of single image with id_product equal to 1
        //all image
        $list = Image::where('products_id',$id)->paginate(10);
         return response()->json([
            'status' => 'success',
            'result'=> $list
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
            "src"=>"required",
            'products_id'=>"required"
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                    //code...
                $new = new Image;
                $path =$request->file('src')->store('wallpapers');
                $new->src = $path;
                $new->products_id = $request->products_id;
                $result = $new->save();
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
        $item = Image::find($id);
         return response()->json([
            'status' => 'success',
            'result'=> $item 
         ]);
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
         //
        $rules = array(
            //'id' => 'required',
            'src'=>'required',
            'products_id'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                    //code...
                $update = Image::find($id);
                if ($request->has('src')) {
                    $path =$request->file('src')->store('wallpapers');
                    $update->src = $path;
                }
                $update->products_id = $request->products_id;
                $result = $update->save();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $delete = Image::find($id);
            Storage::delete([$delete->src]);
            $delete->delete();
            return response()->json([
                'status'=>'success',
                'data'=>[
                    'msg'=>'Deleted'
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>'error',
                'error'=>$th
            ]);
        }
    
    }
}
