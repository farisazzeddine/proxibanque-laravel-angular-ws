<?php

namespace App\Http\Controllers\API;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
// use Illuminate\Support\Facades\Validator;






class UserController extends Controller
{
    Public $successStatus = 200;

    Public function login(){
     if(Auth::attempt(['cin' =>request('cin'), 'password' => request('password')])){
         $user = Auth::user();
         $success['token']= $user->createToken('MyApp')->accessToken;
         
         return response()->json(['success' => $success], $this->successStatus);
        }
         else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }
        
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'cin' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',           
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->except('c_password');
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);

    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details(){
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
    
}
