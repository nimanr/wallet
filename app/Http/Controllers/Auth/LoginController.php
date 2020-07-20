<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function facebookLogin()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::where('provider_id',$facebookUser->getId())
            ->first();

        if(!$user) {
            $user = User::create([
                'name' => $facebookUser->getName(),
                'email' => $facebookUser->getEmail(),
                'provider_id' => $facebookUser->getId(),
                'provider' => 'FACEBOOK'
            ]);
        }
        return $user;
    }

    protected function googleLogin()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('provider_id',$googleUser->getId())
            ->first();

        if(!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'provider_id' => $googleUser->getId(),
                'provider' => 'GOOGLE'
            ]);
        }
        return $user;
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {

        if($provider=='google') {
            return Socialite::driver('google')->redirect();
        } elseif($provider=='facebook') {
            return Socialite::driver('facebook')->redirect();
        } else {
            return false;
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        if($provider=='google'){
            $user = $this->googleLogin();
        } elseif ($provider=='facebook'){
            $user = $this->facebookLogin();
        } else {
            return redirect('/login');
        }

        Auth::login($user, true);

        return redirect('/home');
    }

}
