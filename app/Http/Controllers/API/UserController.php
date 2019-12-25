<?php

namespace App\Http\Controllers\API;
use App\User;
use App\Gerant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','getGerant','getAgent','countAgent','countGerant']]);
    }
    //statistique Agent et gerant
    public function countGerant(){
         return response()->json(User::where('is_gerant',true)->count());
    }
    public function countAgent(){
         return response()->json( User::where('is_conseiller',true)->count());
    }
    //pour les employeur soit agent au bien gerant
    public function getGerant(){
       
        return response()->json( User::where('is_gerant',true)->orderBy('id','DESC')->get());
       
    }
    public function getAgent(){
       
        return response()->json( User::where('is_conseiller',true)->orderBy('id','DESC')->get());
        
    }
     /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $coordonne = $request->only('cin', 'password');

        if (!$token = $this->guard()->attempt($coordonne)) {
            return response()->json(['error' => "CIN et PASSWORD n'exist pas"], 401);
        }
        
        return $this->respondWithToken($token);
    }

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'       => 'required',
            'prenom'     => 'required',
            'email'      => 'required|email',
            'cin'        => 'required',
            'password'   => 'required',
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
        if($input['is_gerant'] == true){
            $gerants = new Gerant;
            $gerants->idGerant = $user->id;
            $gerants->save();
         }

        return response()->json(['success'=>'employer crée avec succsse',
                                 $this->login($request)],200);
                                                       
         

    }
   
     /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'vous etes déconnecté']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $this->guard()->factory()->getTTL() * 60,
            'userId'       => auth()->user()->id,
            'userName'     => auth()->user()->name,
            'gerant'       => auth()->user()->is_gerant
            
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
    
}
