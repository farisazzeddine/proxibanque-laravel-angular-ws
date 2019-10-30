<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Gerant;
use App\Conseiller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cin' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index(){
            $employer = User::all();
            return response()->json($employer);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create()
    {
            $users = new User;
            $users->name = request('name');
            $users->prenom = request('prenom');
            $users->email = request('email');
            $users->cin = request('cin');
            $users->password = Hash::make('password');
            $users->is_gerant = request('is_gerant');
            $users->is_conseiller = request('is_conseiller');
            $users->save();
            if($users->is_gerant == true){
                $gerants = new Gerant;
                $gerants->idGerant = $users->id;
                $gerants->save();
             }else{
                 $conseillers = new Conseiller;
                 $conseillers->idConseiller=$users->id;
                 $conseillers->save();
             }

             return response()->json($users);
   
    }
    public function show($id){
        $employers = User::findOrFail($id);

        return response()->json($employers);
    }

    public function edit($id){
        $employers = User::findOrFail($id);
        $employers->name = request('name');
        $employers->prenom = request('prenom');
        $employers->email = request('email');
        $employers->cin = request('cin');
        $employers->password = Hash::make('password');
        $employers->is_gerant = request('is_gerant');
        $employers->is_employer = request('is_employer');
        $employers->update();
        if($employers->is_gerant == true){
            $gerants = new Gerant;
            $gerants->idGerant = $employers->id;
            $gerants->update();
         }else{
             $conseillers = new Conseiller;
             $conseillers->idConseiller=$employers->id;
             $conseillers->update();
         }

        return response()->json($employers);

    }
    public function destroy($id,$idConseiller){
             $employers = User::findOrFail($id);
             $employers->delete();
             $conseillers = Conseiller::findOrFail($idConseiller);
             $conseillers->delete();
          return response()->json($employers);
    }
}
