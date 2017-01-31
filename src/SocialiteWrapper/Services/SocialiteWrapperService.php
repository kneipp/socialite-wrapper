<?php

namespace Kneipp\SocialiteWrapper\Services;

use App\User;
use Illuminate\Support\Facades\Schema;
use Kneipp\SocialiteWrapper\SocialUser;
use Laravel\Socialite\Contracts\Provider;

class SocialiteWrapperService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialUser::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialUser([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email'    => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
                // klaravel/ntrust or zizaco/entrust packages
                // If roles table exists
                if (Schema::hasTable('roles')) {
                    $role = \App\Role::whereName('user');
                    $user->roles()->attach($role->id);
                }
            }
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
