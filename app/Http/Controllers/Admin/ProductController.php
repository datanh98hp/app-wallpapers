<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;

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
        $list = Product::all();
        $categories = Category::where('status', 1)->get();
        //
        $app_name = env('APP_NAME_PATH');
        //
        $app_url = env('APP_URL');
        $store_path = $app_url . '/storage/app/';
        return view('admin.girl.girl', ['list' => $list, 'categories' => $categories, 'store_path' => $store_path]);
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

        $validated = $request->validate([
            'name' => 'required|min:8',
            'age' => 'required',
            'country' => 'required',
            'video_src' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'category_id' => 'required',
            'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        ///// create data
        $new = new Product;
        $new->name = $request->name;
        $new->age = $request->age;
        $new->country = $request->country;
        if ($request->has('video_src')) {
            $path = $request->file('video_src')->store('video');
            $new->video_src = $path;
        }
        $new->category_id = $request->category_id;
        $new->description = $request->description;
        $result = $new->save();
        
        /// create new image
        foreach ($request->file('image') as $item) {
            $imgPath = $item->store('products_image');
            // $img = Image::create([
            //     'src' => $imgPath,
            //     'product_id' => $new->id
            // ]);
            $img = new Image;
            $img->src = $imgPath;
            $img->product_id = $new->id;
            $img->save();
        }

        //return $numFile = count($request->file('image'));

        return redirect()->back()->with('status', 'Created !');

        //return response()->json(['image'=>$request->file('image')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // try {
        $item = Product::find($id);
        $categories = Category::where('status', 1)->get();

        $app_name = env('APP_NAME_PATH');
        //
        $app_url = env('APP_URL');
        $store_path = $app_url . "/" . $app_name . '/storage/app/';
        return view('admin.Girl.detailGirl', ['item' => $item, 'categories' => $categories, 'store_path' => $store_path]);
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('status','Can not find it.');
        // }
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
        $validated = $request->validate([
            'name' => 'required|min:6|max:50',
            'age' => 'required',
            'country' => 'required',
            // 'video_src' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:30000',
            'category_id' => 'required',
            'description' => 'required',
            //'image' => 'mimes:jpeg,jpg,png,gif|max:15000'
        ]);
        //  create data

        $new =  Product::find($id);
        $new->name = $request->name;
        $new->age = $request->age;
        $new->country = $request->country;
        if ($request->has('video_src')) {
            //remove old video
            Storage::delete([$new->video_src]);
            //
            $path = $request->file('video_src')->store('video');
            $new->video_src = $path;
        }
        $new->category_id = $request->category_id;
        $new->description = $request->description;
        $result = $new->save();
        //



        if ($request->hasFile('image')) {
            //remove old image
            $imageList = Image::where('product_id', $id)->get();
            foreach ($imageList as $item) {
                Storage::delete([$item->src]);
            }

            Image::where('product_id', $id)->delete();
            //create new image
            $imgPath = $request->file('image')->store('products_image');
            $img = Image::create([
                'src' => $imgPath,
                'product_id' => $new->id
            ]);
        }
        //
        if ($result) {
            return redirect()->back()->with('status', 'Updated !');
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

        try {
            $del = Product::find($id);
            $imageList = Image::where('product_id', $id)->get();
            //del old video & image
            foreach ($imageList as $item) {
                Storage::delete([$item->src]);
            }
            Storage::delete([$del->video_src]);

            $del->delete();
            return redirect()->back()->with('status', 'Deleted !');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Error !' . $th);
        }
    }
}
