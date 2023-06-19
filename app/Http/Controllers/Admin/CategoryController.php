<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //

        $list = Category::orderBy('id', 'desc')->get();

        return view('admin.category.category', ['list' => $list]);
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
        $validated = $request->validate([
            'title' => 'required|unique:category|max:50',
            'status' => 'required',
        ]);
        try {
            $item = Category::create([
                'title' => $request->input('title'),
                'status' => $request->input('status'),
            ]);

            return redirect()->back()->with('status', 'Đã tạo thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Không thành công' . $th);
        }
        //
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
        //

        $validated = $request->validate([
            'title' => 'required|unique:category|max:50',
            'status' => 'required',
        ]);
        $item = Category::find($id);
        // $item->update([
        //     "title" =>$request->title,
        //     "status"=>$request->status,
        // ]);
        $item->title = $request->title;
        $item->status = $request->status;
        $item->save();

        return redirect('/category')->with('status', 'Đã cập nhật');
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
            $item = Category::find($id);
            if ($item !== null) {
                $item->delete();
            } else {
                return response()->json([
                    'statusCode' => 400,
                    'messsage' => "Danh mục này không tồn tại"
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('status', 'Không thể xóa ! Một số thông tin bị ràng buộc');
            // return response()->json([
            //     'statusCode'=>500,
            //     'messsage'=>"Lỗi truy vấn ",
            //     'error'=>$th
            // ]);
        }
    }
}
