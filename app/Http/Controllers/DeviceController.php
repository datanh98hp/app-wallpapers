<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    //
    function list()
    {
        return Devices::all();
    }
    function add(Request $request)
    {

        $rules = array(
            "id_user"=>"required",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else {

            $device = new Devices;
            $device->name = $request->name;
            $device->id_user = $request->id_user;
            $result = $device->save();
            if ($result) {
                return [
                    "result" => "Data has been save !"
                ];
            } else {
                return [
                    "result" => "Operation Failed !"
                ];
            }
        }

////    

        
    }
    function update(Request $request){
        $device = Devices::find($request->id);
        $device->name = $request->name;
        $device->id_user = $request->id_user;

        $result = $device->save();

        if($result){
            return [
                "result" => "data has updated"
            ];
        }
        return [
            "result"=>"Update failed !"
        ];
    }
    function delete($id){
        $device = Devices::find($id);
        $result = $device->delete();

        if ($result){
            return [
                "result" => "data has been delete !" . $id
            ];
        }else {
            return [
                "result" => "data hasn't been delete !" . $id
            ];
        }
        

    }

    function search($key){


        $result = Devices::where('name','like','%'.$key.'%')->get();
        return [
            "result"
            => $result
        ];
    }
}
