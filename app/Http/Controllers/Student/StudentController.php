<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;

class StudentController extends Controller
{
    public function detail($id) {
        $students = [
            ['id' => 1, 
            'name' => 'Tony Stark', 
            'score' => [97, 95, 90]
            ],
            ['id' => 2, 
            'name' => 'Jane Smith',
            'score' => [86, 76, 90]
            ],
            ['id' => 3,
            'name' => 'Michael Johnson',
            'score' => [55, 64, 67]
            ],
        ];

        $data = collect($students)->firstWhere('id', $id);
        return view('students.detail', compact('data'));
    }

    public function showCreate(){
        return view('students.create');
    }

    public function insertStudent(Request $request){
        $name = $request->input('student_name');
        $nim = $request->input('student_nim');

        $process = Students::create([
            'name' => $name,
            'nim' => $nim,
        ]);

        if($process){
            return redirect()->route('home');
        } else {
            return back()->withInput();
        }
    }
}