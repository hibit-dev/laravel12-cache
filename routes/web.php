<?php

use Illuminate\Support\Facades\Route;

Route::get('/cache', [App\Http\Controllers\RepositoryController::class, 'get']);

Route::get('/', function () {
    return view('welcome');
});
