<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            
            
            $googleUser = Socialite::driver('google')->user();
           
            $user = User::where('google_id', $googleUser->getId())->first();

            if ($user) {
                Auth::login($user);
                return redirect()->intended('dashboard');
            } else {
              //  dd($googleUser);
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => encrypt('123456dummy'),
                    'role'=>'user'
                ]);
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            return redirect('login')->withErrors(['login' => 'Failed to login with Google']);
        }
    }
}

