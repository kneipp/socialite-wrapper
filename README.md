# Laravel 5.4 Socialite Wrapper


Description goes here:

- `awesome subtopic`
- `shine subtopic`

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

- add keys in config/services.php and .env file:
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

- Run: php artisan vendor:publish --provider="Kneipp\SocialiteWrapper\SocialiteWrapperServiceProvider"
  
- Run: php artisan migrate

- Create link in your views:
```html
<a href="redirect/facebook">FB Login</a>
<a href="redirect/twitter">Twitter Login</a>
```