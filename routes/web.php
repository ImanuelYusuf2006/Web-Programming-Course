<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function(){
//     return view('login');
// })->name('login');


// Route::get('/register', function(){
    //     return view('register');
    // })->name('register.view');
    
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.do');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/studeny/{id}', [StudentController::class, 'index'])->name('students.detail');