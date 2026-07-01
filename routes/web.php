<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
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
Route::post('/register', [AuthController::class, 'register'])->name('register.do');

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

Route::prefix('students')->name('students.')->group(function(){
    Route::get('/create', [StudentController::class, 'showCreate'])->name('create');
    Route::post('/create', [StudentController::class, 'insertStudent'])->name('insert');
    Route::get('/update/{id}', [StudentController::class, 'showEdit'])->name('edit');
    Route::patch('/update/{id}', [StudentController::class, 'updateStudent'])->name('update');
    Route::delete('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete');
    Route::post('/score/insert', [StudentController::class, 'insertScore'])->name('scores.insert');
    Route::post('/predict/{id}', [StudentController::class, 'predictScore'])->name('predict');
    Route::get('/{id}', [StudentController::class, 'detail'])->name('detail');
});

Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');