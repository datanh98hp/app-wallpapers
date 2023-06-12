<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        //
        if (!$user || !Hash::check($request->password,$user->password)) {
            return response([
                "message" => ["The credencials do not match our record. "]
            ], 404);
            
        }
         $token = $user->createToken('token-name', ['server:update'])->plainTextToken;
        //$token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token
        ];
        return response($response, 201);
    }

    //
    public function register(Request $request){
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        try {
            //code...
            $data = $request->all();
            $check = $this->create($data);
            return response()->json([
                'status'=>'success',
                'result'=>[
                    'id'=>$check->id
                ]
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status'=>'error',
                'error'=>[
                    'msg'=>$th[2]
                ]
            ]);
        }
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }  
}
