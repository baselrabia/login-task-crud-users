<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        $authUser=User::firstOrNew(['ProviderId'=>$user->id]);

        if(!User::where(['ProviderId'=>$user->id])->first()){
                $authUser->name=$user->name;
                $authUser->email=$user->email;
                $authUser->provider=$provider;
                $authUser->ProviderId=$user->id;

                $authUser->save();
        };

        auth()->login($authUser);

        return redirect('/users');

    }
}
