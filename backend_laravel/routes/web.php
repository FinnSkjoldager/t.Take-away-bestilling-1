<?php

use Illuminate\Support\Facades\Route;

Route::get('/web', function () {
    return "<h3>backend_laravel web</h3>";
});
Route::get('/', function () {
    return redirect('index.html');
});
Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');
