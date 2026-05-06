<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $students = [
            ['id' => 1, 'name' => 'Tony Stark', 'score' => [97, 95, 90]],
            ['id' => 2, 'name' => 'Jane Smith', 'score' => [86, 76, 90]],
            ['id' => 3, 'name' => 'Michael Johnson','score' => [55, 64, 67]],
        ];
        return view('home', compact('students'));
    }
}