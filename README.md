# Laravel 5.4 Socialite Wrapper

Socialize implementation for your Laravel 5.4 project.

Awesome to use with Sentinel (and free social login option), Entrust or default Auth.
 
**Original:** https://blog.damirmiladinov.com/laravel/laravel-5.2-socialite-facebook-login.html

## Usage

### Step 1: Install Through Composer

```
composer require kneipp/socialite-wrapper
```

### Step 2: Add the Service Provider

Add the provider in `config/app.php`:

```php
Kneipp\SocialiteWrapper\SocialiteWrapperServiceProvider::class,
```


### Step 3: Almost done

- add keys in config/services.php:
```php
        'facebook' => [
            'client_id' => env('FACEBOOK_KEY'),
            'client_secret' => env('FACEBOOK_SECRET'),
            'redirect' => env('APP_URL') . '/callback/facebook',
        ],
    
        'twitter' => [
            'client_id' => env('TWITTER_KEY'),
            'client_secret' => env('TWITTER_SECRET'),
            'redirect' => env('APP_URL') . '/callback/twitter',
        ],
```

- add .env file keys and check APP_URL value:

```
FACEBOOK_KEY=
FACEBOOK_SECRET=

TWITTER_KEY=
TWITTER_SECRET=
```

- Run:

```
php artisan vendor:publish --provider="Kneipp\SocialiteWrapper\SocialiteWrapperServiceProvider"
php artisan migrate
```

- Create your links in views/auth/login.blade.php for example:
```html
<a href="redirect/facebook">FB Login</a>
<a href="redirect/twitter">Twitter Login</a>
```