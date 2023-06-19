<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Product::paginate(10);

        return response()->json([
            'status' => 'success',
            'result' => $list
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
            'name' => 'required|min:6|max:18',
            'age' => 'required',
            'country' => 'required',
            'video_src' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:30000',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:15000'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                "status" => "error",
                "error" => $validator->errors()
            ];
        } else {
            try {

                //save file video
                if ($request->has('video_src')) {
                    # code...
                    $path = $request->file('video_src')->store('video');
                    //
                    //code...
                    $new = new Product;
                    $new->name = $request->name;
                    $new->age = $request->age;
                    $new->country = $request->country;
                    if ($request->has('video_src')) {
                        $new->video_src = $path;
                    }
                    $new->category_id = $request->category_id; // 1: girls
                    $new->description = $request->description;
                    $result = $new->save();
                    if ($request->has('image')) {
                        # code...
                        //create new image
                        $imgPath = $request->file('image')->store('products_image');
                        $img = Image::create([
                            'src' => $imgPath,
                            'products_id' => $new->id
                        ]);
                    }
                }
                if ($result) {
                    return [
                        "status" => "success",
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
                    'status' => 'error',
                    'error' => $th
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
            $item = Product::find($id);
            $item->view_count = $item->view_count + 1;
            $item->save();
            
            return response()->json([
                'status' => 'success',
                'result' => $item
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'error' => $th
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
        //return $id;
        //
        $rules = array(
            'name' => 'required|min:6|max:18',
            'age' => 'required|max:18',
            'country' => 'required',
            'video_src' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:30000',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:15000'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                "status" => "error",
                "error" => $validator->errors()
            ];
        } else {
            try {
                //code...
                $update = Product::find($id);
                $update->name = $request->name;
                $update->age = $request->age;
                $update->country = $request->country;
                if ($request->has('video_src')) {
                    //delete old file
                    Storage::delete([$update->video_src]);
                    //
                    $path = $request->file('video_src')->store('video');
                    $update->video_src = $path;
                }
                $update->category_id = $request->category_id;
                $update->description = $request->description;
                $result = $update->save();
                if ($request->has('image')) {
                    # code...
                    //create new image
                    $imgPath = $request->file('image')->store('products_image');
                    $img = Image::create([
                        'src' => $imgPath,
                        'products_id' => $update->id
                    ]);
                }
                if ($result) {
                    return [
                        "status" => "success",
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
                    'status' => 'error',
                    'error' => $th
                ]);
            }
        }
    }
    public function delete_single_img($id_img)
    {
        try {
            $img = Image::find($id_img);
            Storage::delete([$img->video_src]);
            $img->delete();

            return  [
                "status" => "success",
                "result" => "Data has been deleted !"
            ];
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'error' => $th
            ]);
        }
    }
    public function add_image_product(Request $request, $id_product)
    {

        $list = $request->file('image');
        try {
            foreach ($list as $item) {
                //create new image
                $itemPath = $item->store('products_image');
                $imgItem = Image::create([
                    'src' => $itemPath,
                    'products_id' => $id_product
                ]);
            }
            return response()->json([
                'status' => 'success',
                'result' => $imgItem
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'error' => $th
            ]);
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
        // remove product   
        try {
            //code...
            $del = Product::find($id);
            Storage::delete([$del->video_src]);
            $imgs = Image::where('products_id', $id);
            foreach ($imgs as $item) {
                Storage::delete([$item->src]);
            }
            $imgs->delete();
            $del->delete();
            return response()->json([
                'status' => 'success',
                'result' => $del
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'error' => $th
            ]);
        }
    }
}
