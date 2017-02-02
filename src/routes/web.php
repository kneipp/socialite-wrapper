<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('redirect/{provider}', 'Kneipp\SocialiteWrapper\Http\Controllers\SocialiteWrapperController@redirect');
    Route::get('callback/{provider}', 'Kneipp\SocialiteWrapper\Http\Controllers\SocialiteWrapperController@callback');
});
