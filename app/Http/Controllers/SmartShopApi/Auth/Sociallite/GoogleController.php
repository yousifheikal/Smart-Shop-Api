<?php

namespace App\Http\Controllers\smartShopApi\Auth\Sociallite;

use App\ApiTrait\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    use GeneralTrait;
    //

    public function handleGoogleRedirect(){
        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback(){

        try {

            $user = Socialite::driver('google')->user();
            $userExisted = User::where('oauth_id', $user->getId())->where('oauth_type', 'google')->first();

            if ($userExisted){
                Auth::login($userExisted);
                return redirect()->intended('dashboard');
//                return $this->returnSuccessMessage('000', 'login Success');
            }else{

                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'oauth_id' => $user->getId(),
                    'password' => Hash::make('01004121711'),
                    'oauth_type' => 'google'
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        }catch (\Exception $e){
            return $e ;
        }
    }

}
