<?php

namespace App\Http\Controllers;
use App\Models\Wallpaper;
use App\Models\UserLikeWallpaper;
use App\Models\Anonymous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WallpaperController extends Controller
{
    //
    public function index()
    {
        //all wallpapers

        $list = Wallpaper::paginate(5);
        $commons = Wallpaper::orderBy('id', 'desc')->orderBy('created_at', 'desc')->get();
        return response()->json([
           'status' => 'success',
           'statusCode' => '200',
           'result'=> [
                'data'=>$list,
                'commons'=>$commons
           ],
           //"check"=>asset($commons[0]->src)
        ]);
       
    }
    public function getWallpaperLatest()
    {
        $list = Wallpaper::latest()->paginate(5);

        return response()->json([
            'statusCode' => '200',
            'status' => 'success',
            'result'=> $list
         ]);
    }
    public function getWallpaperbyCategory($id_category)
    {
        $list = Wallpaper::where('category_id',$id_category)->paginate(5);
        return response()->json([
            'statusCode' => '200',
            'status' => 'success',
            'result'=> $list
         ]);
    }
    public function getWallpaperCommon()
    {
        $list = Wallpaper::orderBy('id', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
            'statusCode' => '200',
            'status' => 'success',
            'result'=> $list
         ]);
        
    }
    public function getWallpaperByName($name)
    {
        $list = Wallpaper::where('name',trim($name))->orderBy('name', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        return response()->json([
            'statusCode' => '200',
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
            "name"=>"required",
            'category_id'=>"required"
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {
            try {
                   //code...
                $new = new Wallpaper;
                $path =$request->file('src')->store('wallpapers');
                $new->src = $path;
                $new->name = $request->name;
                $new->category_id = $request->category_id;
                $result = $new->save();

                if ($result) {
                    return [
                        "status"=>"success",
                        'statusCode' => '200',
                        "result" => "Data has been save !"
                    ];
                } else {
                    return [
                        'statusCode' => '500',
                        "result" => "Operation Failed !"
                    ];
                }
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json([
                    'statusCode' => '400',
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
    public function show($id,$anonymous_id)
    {
        $item = Wallpaper::find($id);

        $checkLike = UserLikeWallpaper::where('anonymous_id',$anonymous_id)
                                    ->where('wallpaper_id',$id)->first();

        $isLike= false;
        if($checkLike!==null){
            $isLike= false;
        }
         return response()->json([
            'statusCode' => 200,
            'status' => 'success',
            'result'=> $item,
            'isLike'=>false
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

       $rules = array(
        "src"=>"required",
        "name"=>"required",
        'category_id'=>"required"
        );
    $validator = Validator::make($request->all(),$rules);
    if($validator->fails()){
        return $validator->errors();
    }else {
        try {
                //code...
            $new = Wallpaper::find($id);
            $path =$request->file('src')->store('wallpapers');
            $new->src = $path;
            $new->name = $request->name;
            $new->category_id = $request->category_id;
            $result = $new->save();

            if ($result) {
                return [
                    'statusCode' => '200',
                    "status"=>"success",
                    "result" => "Data has been update !"
                ];
            } else {
                return [
                    'statusCode' => '500',
                    "result" => "Operation Failed !"
                ];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'statusCode' => '400',
                'status'=>'error',
                'error'=>$th
            ]);
        }
        
    }
    }
    public function user_like_wallpaper(Request $request,$id)
    {
       
        // $rules = array(
        //     "anonymous_id"=>"required",
        //    // "wallpaper_id"=>"required",
        //     );
        // $validator = Validator::make($request->all(),$rules);
        // if($validator->fails()){
        //     return $validator->errors();
        // }else {

            //check is liked
            $check = UserLikeWallpaper::where('wallpaper_id',$id)
                                ->where('anonymous_id',$request->anonymous_id)
                              ->first();
            if($check==null){ 
                // not like
                $item = UserLikeWallpaper::create([
                    'anonymous_id'=>$request->anonymous_id,
                    'wallpaper_id'=>$id
                ]);

                return response()->json([
                    'statusCode' => 201,
                    'status' => 'success',
                    'isLike'=>true,
                    'result'=> $item
                ]);

            }else{
                // update is unlike
                $check->delete();
                return response()->json([
                    'statusCode' => '200',
                    'status' => 'success',
                    'isLike'=>false,
                    //'result'=> $check
                ]);
            }
        //}
    }

    
    public function list_wallpaper_liked($anonymous_id){
         try {
        $list = UserLikeWallpaper::where('anonymous_id',$anonymous_id)->get();
     
       $listImgLiked = [];
      
        for ($i=0; $i < count($list) ; $i++) { 
            $img=Wallpaper::find($list[$i]->wallpaper_id);
            array_push($listImgLiked,$img);
        }

        return response()->json([
            'statusCode' => 200,
            'status' => 'success',
            'result'=> [
            'user'=> $list,
            //'ad'=>$list2,
            'data'=>$listImgLiked,
           ]
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'statusCode' => '400',
                'status'=>'error',
                'error'=>$th
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
        //
        try {
            $delete = Wallpaper::find($id);
            //Storage::delete([$delete->src]);
            $delete->delete();
            
            return response()->json([
                'statusCode' => '200',
                'status'=>'success',
                'data'=>[
                    'msg'=>'Deleted'
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'statusCode' => '400',
                'status'=>'error',
                'error'=>$th
            ]);
        }
    }
}
