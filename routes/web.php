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

Route::get('/home', function(){
    $students = [
        [
            'id' => 1,
            'name' => 'Tony Stark',
            'score' => [97, 95, 90]
        ],
        [
            'id' => 2,
            'name' => 'Steve Rogers',
            'score' => [15, 88, 92]
        ],
        [
            'id' => 3,
            'name' => 'Bruce Banner',
            'score' => [90, 20, 88]
        ],
    ];
    return view('home', compact('students'));
})->name('home');

Route::get('/home/{id}', function($id){
    $students = [
        [
            'id' => 1,
            'name' => 'Tony Stark',
            'score' => [97, 95, 90]
        ],
        [
            'id' => 2,
            'name' => 'Steve Rogers',
            'score' => [15, 88, 92]
        ],
        [
            'id' => 3,
            'name' => 'Bruce Banner',
            'score' => [90, 20, 88]
        ],
    ];

    $data = collect($students)->firstWhere('id', $id);
    
    return view('students.detail', compact('data'));
})->name('students.detail');