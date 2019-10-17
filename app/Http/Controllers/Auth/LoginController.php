<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    


    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('google')->stateless()->user();

        // dd($userSocial);

        //check if user exists and log in
        $user = User::where('email', $userSocial->user['email'])->first();
        if ($user) {
            if(Auth::loginUsingId($user->id)){
                return redirect()->route('/admin/home');
            }
        }

        //else sign the user up
        $userSignup = User::create([
            'name' => $userSocial->user['name'],
            'email' => $userSocial->user['email'],
            'id' => $userSocial->user['id'],
            'password' => Hash::make('123456'),
            'avatar' => $userSocial->avatar,
        ]);

        if ($userSignup) {
            if(Auth::loginUsingId($userSignup->id)){
                return redirect()->route('/admin/home');
            }
        }

    }
    
}
