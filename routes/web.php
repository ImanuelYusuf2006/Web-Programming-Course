<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login', function(){
    return view('login');
})->name('login.do');

Route::get('/register', function(){
    return view('register');
})->name('register.view');

Route::prefix('product')->group(function(){
    Route::get('/list', function(){
        return "<h1>Product List</h1>";
    })->name('product.list');
        Route::get("/detail/{product_id}", function($product_id){
        return "<h1>Product Detail Id {$product_id} page</h1>";
    })->name('product.detail');
});

Route::redirect('/kontak-kami', '/register');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');