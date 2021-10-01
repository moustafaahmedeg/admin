<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;


Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'product'], function() {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        

        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/create', [ProductController::class, 'store']);


        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'update']);

 
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });
});


require __DIR__.'/auth.php';
