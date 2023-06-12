<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anonymous;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class AnonymousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = Anonymous::paginate(10);
        //
        return $list;
    }
    public function loginAnonymous(Request $request)
    {

        //validate
        $rules = array(
            "device_code" => "required",
            "name" => "required",
            // "sex"=>"required",
            // "dateOfBirth"=>"required"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            //ccreate new
            $new = Anonymous::create([
                'device_code' => $request->device_code,
                'name' => $request->name,
                // 'sex' => $request->sex,
                'verify_code' => Str::random(16),
                'dateOfBirth' => $request->dateOfBirth,
            ]);
            return response()->json([
                'status' => "OK",
                'result' => $new
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
        try {
            //code...
            $item = Anonymous::findOrFail($id);
            return response()->json([
                'status' => "success",
                'result' => $item
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => "error",
                'error' => $th
            ]);
        }
    }
    public function show_by_dive_code($id_dive){

        //return $id_dive;
        try {
            //code...
            $item = Anonymous::where('device_code',$id_dive)->get();
            return response()->json([
                'status' => "success",
                'result' => $item
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => "error",
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
        //
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
    }
}
