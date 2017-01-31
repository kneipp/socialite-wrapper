<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('redirect/{provider}', 'Kneipp\Ward\Http\Controllers\SocialiteWrapperController@redirect');
    Route::get('callback/{provider}', 'Kneipp\Ward\Http\Controllers\SocialiteWrapperController@callback');
});
