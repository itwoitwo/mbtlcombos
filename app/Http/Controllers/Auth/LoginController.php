<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
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

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $userInfo = Socialite::driver('twitter')->user();

            $user = User::find($userInfo->id);

            if($user){
                if($user->id_name != $userInfo->nickname 
                || $user->name != $userInfo->name)
                    {   
                        $user->id_name = $userInfo->nickname;
                        $user->name = $userInfo->name;
                        $user->save();
                    }
            } else {
            //ユーザー登録
                User::create([
                    'id' => $userInfo->id,
                    'name' => $userInfo->name,
                    'id_name' => $userInfo->nickname,
                    ]);

                $user = User::find($userInfo->id);
            }

            auth()->login($user, true);
            return redirect()->to('/');
        }
        catch(\Exception $e) {
            return redirect()->to('/');   // redirect url
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
