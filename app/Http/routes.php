<?php

Route::get('/', function () {
    return view('pages.welcome');
});
Route::resource('flyers', 'FlyerController');
Route::get("{zip}/{street}", 'FlyerController@show');
Route::post("{zip}/{street}/photos", ["as" => "store_photo_path", "uses" => 'FlyerController@addPhotos']);
