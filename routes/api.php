<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProductApiController;



Route::group(['prefix' => 'user'], function() {
    Route::post('/register', [UserApiController::class, 'create']);
    Route::post('/login', [UserApiController::class, 'login']);

    
});


Route::group(['middleware' => ['auth:sanctum']], function() {
   
});

Route::group(['prefix' => 'product'], function() {
    Route::get('/create', [ProductApiController::class, 'create']);
    Route::post('/create', [ProductApiController::class, 'store']);
    Route::put('/edit/{id}', [ProductApiController::class, 'edit'])->whereNumber('id');
    Route::delete('/delete/{id}', [ProductApiController::class, 'delete'])->whereNumber('id');
    Route::get('/get/all', [ProductApiController::class, 'getAll']);
    Route::get('/get/{id}', [ProductApiController::class, 'get'])->whereNumber('id');
});


