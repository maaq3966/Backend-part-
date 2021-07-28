<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidateRegisterAdmin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterAdminController extends Controller
{
    public function register(ValidateRegisterAdmin $request){
        $response =[];
        try{
        $register_admin = User::registerAdmin($request);
        $response = ["error" => false, "error_msg" => "User registered successfuly"];
        }
        catch(Exception $e){
           $response = ["error" => true, "error_msg" => $e ];
        }
        return $response;
    }
    public function login(Request $request){

        $response =[];
        try{
        $user = User::where('email',$request->email)->first();
        if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('my-app-token')->plainTextToken;
            $response = ["error" => false, "error_msg" => "User registered successfuly" , "password_matched" => true , "user" => $user, 'token' => "Bearer ".$token];
        }
        else
            $response = ["error" => false, "error_msg" => "User registered successfuly" , "password_matched" => false];
        }
        catch(Exception $e){
           $response = ["error" => true, "error_msg" => $e ];
        }
        return $response;
    }
}
