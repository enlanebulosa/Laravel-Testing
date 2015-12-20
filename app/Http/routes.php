<?php

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/sitemap', function () {
    return 'SiteMap';
});