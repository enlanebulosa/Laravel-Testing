<?php

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/sitemap', function () {
    return 'SiteMap';
});

Route::get('/upload',   'UploadFileController@index');
Route::post('/upload',  'UploadFileController@upload');