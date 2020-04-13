<?php

namespace App\Http\Controllers\Auth;


use App\Http\Repositories\Configs\UsersRepo;
use App\Entities\Configs\User;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $usersRepo;
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, UsersRepo $usersRepo)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->usersRepo = $usersRepo;
        $this->auth = $auth;
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
            'user_name' => 'required|max:255|unique:user_name',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:email',
            'password' => 'required|confirmed|min:6',
        ]);
    }



    public function validateLogin(Request $request)
    {

        if (! $request->has('user_name') || ! $request->has('_token'))
                return redirect()->back()->withErrors(['Completar Campos!']);

         // Reviso que el usuario exista y tenga acceso
         //$user = $this->usersRepo->searchByEmail($request->get('email'),$request->get('password'));

        if (!Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password], $request->remember))
           // if(empty($user) || is_null($user))
                return redirect()->back()->withInput()->withErrors(['Usuario Inválido!']);
           // else
                // Login de usuario
             //   Auth::login($user, false);

        return redirect()->route('home');

    }


    public function login(){
        if (! $this->auth->check())
            return view('login');
        else
            return redirect()->intended('home');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    
}
