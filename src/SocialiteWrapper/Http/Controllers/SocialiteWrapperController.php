<?php

namespace Kneipp\SocialiteWrapper\Http\Controllers;

use App\Http\Controllers\Controller;
use Kneipp\SocialiteWrapper\Services\SocialiteWrapperService;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Laravel\Socialite\Facades\Socialite;

class SocialiteWrapperController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialiteWrapperService $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));
        Sentinel::login($user);

        return redirect()->to($this->redirectTo);
    }
}
