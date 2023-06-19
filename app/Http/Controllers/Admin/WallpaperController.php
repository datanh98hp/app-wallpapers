<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class WallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Wallpaper::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.wallpapers.wallpapers', ['list' => $list, 'categories' => $categories]);
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
            "name" => "required",
            "src" => "required",
            'category_id' => "required"
        ]);
        $path = $request->file('src')->store('wallpapers');

        $new = Wallpaper::create([
            'name' => $request->name,
            'src' => $path,
            'category_id' => $request->category_id
        ]);

        return redirect('/wallpapers-admin')->with('status', 'Created !');
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
        $validated = $request->validate([
            "name" => "required",
            'category_id' => "required"
        ]);

        $item = Wallpaper::find($id);
        //update
        $item->name = $request->name;
        if ($request->hasFile('src')) {
            //delete old img
            $oldFIle = $item->src;
            Storage::delete($oldFIle);
            # code...
            $path = $request->file('src')->store('wallpapers');
            $item->src = $path;
        }
        $item->category_id = $request->category_id;
        $item->save();

        return redirect('/wallpapers-admin')->with('status', 'Updated !');
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
            $it = Wallpaper::find($id);
            Storage::delete([$it->src]);

            $it->delete();
            return redirect()->back()->with('status', 'Deleted !');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Error ');
        }
    }
}
