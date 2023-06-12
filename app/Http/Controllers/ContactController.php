<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    public function index()
    {
        //all contacts

        $list = Contact::paginate(5);
        return response()->json([
           'status' => 'success',
           'result'=> $list
        ]);
       
    }
    public function getContactByName($name)
    {
        //all contacts

        $list = Contact::where('name',trim($name))->get();
        return response()->json([
           'status' => 'success',
           'result'=> $list
        ]);
       
    }
    public function store(Request $request)
    {
        //store contacts

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
            $new = new Contact;
            $new->name = $request->name;
            $new->content = $request->content;
            $result = $new->save();

            if ($result) {
                return [
                    "status"=>"success",
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
    public function show($id)
    {
        // contacts
        $list = Contact::find($id);
        return response()->json([
           'status' => 'success',
           'result'=> $list
        ]);
       
    }
    public function update(Request $request,$id)
    {
        // contacts
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
            $new = Contact::find($id);
            $new->name = $request->name;
            $new->content = $request->content;
            $result = $new->save();

            if ($result) {
                return [
                    "status"=>"success",
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
    public function destroy($id)
    {
        // contacts
        try {
            $delete = Contact::find($id);
            //Storage::delete([$delete->src]);
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
