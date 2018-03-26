<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrateur;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    
    public function indcreate()
    {
        return view('registration.createreg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Request $request)
    {
        // Valide la form
        $this->validate(request(),[
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'contact'=>'required'
        ]);
        //creer et sauvegarder administrateur
            $admin = Administrateur::create(request(['nom','prenom','email','password','contact']));
            //sign in
            auth()->login($admin);
                //redirection vers la page d'accueil
            return redirect()->home();
    }
*/
use RegistersUsers;

/**
 * Where to redirect users after registration.
 *
 * @var string
 */
protected $redirectTo = '/admin/index';

/**
 * Create a new controller instance.
 *
 * @return void
 */
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
protected function validator(array $data)
{
    return Validator::make($data, [
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'contact'=>'required'
    ]);
}

/**
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return \App\User
 */
protected function create()
{
    return Administrateur::create([
        'nom'=>'required',
        'prenom'=>'required',
        'email'=>'required',
        'password'=>'required|confirmed',
        'contact'=>'required',
        'roles_id'=>'2'
    ]);
}
}
