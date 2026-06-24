<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Scores;
use App\Models\Students;
use App\Services\ScorePredictionService;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function detail($id) {
        $data = Students::where('id', $id)->first();
        $courses = Courses::get();
        $scores = Scores::with('course')->where('student_id', $id)->get();

        return view('students.detail', compact('data', 'courses', 'scores'));
    }

    public function showCreate(){
        return view('students.create');
    }

    public function insertStudent(Request $request){
        // $name = $request->input('student_name');
        // $nim = $request->input('student_nim');

        $validated = $request->validate([
            'student_name' => ['required'],
            'student_nim' => ['required', 'numeric', 'unique:students,nim'],
        ]);

        $name = $validated['student_name'];
        $nim = $validated['student_nim'];

        $process = Students::create([
            'name' => $name,
            'nim' => $nim,
        ]);

        if($process){
            return redirect()->route('home');
        } else {
            // return back()->withInput()->with('error_message', 'Terjadi kesalahan saat insert');
            return back()->withInput()->withErrors(['error_message' => 'Terjadi kesalahan saat insert']);
        }
    }

    public function showEdit($id){
        if($id == null || $id == 0){
            return back();
        }

        $student = Students::where('id', $id)->first(); //firstWhere()

        return view('students.edit', compact('student'));
    }

    public function updateStudent($id, Request $request){
        $validated = $request->validate([
            'student_name' => ['required'],
            'student_nim' => ['required', 'numeric', 'unique:students,nim'],
        ]);

        $new_name = $validated('student_name');
        $new_nim = $validated('student_nim');

        $student = Students::where('id', $id)->first();
        if($student == null){
            return back();
        }

        $updated_data = [];

        if($new_name != $student->name){
            $updated_data['name'] = $new_name;
        }

        if($new_nim != $student->nim){
            $updated_data['nim'] = $new_nim;
        }

        if(!empty($updated_data)){
            $student->update($updated_data);

            return redirect()->route('home');
        }

        return back()->withInput();
    }

    public function deleteStudent($id){
        $student = Students::where('id', $id)->first();

        if($student != null){
            $student->delete();

            return redirect()->route('home');
        }

        return back();
    }

    public function insertScore(Request $request){
        $student_id = $request->input('student_id');
        $course_id = $request->input('course_id');
        $score = $request->input('score');
        $attendance = $request->input('attendance');
        $assignment = $request->input('assignment');
        $mid_exam = $request->input('mid_exam');
        $final_exam = $request->input('final_exam');


        $insertData = Scores::create([
            'student_id' => $student_id,
            'course_id' => $course_id,
            'score' => $score,
            'attendance' => $attendance,
            'assignment' => $assignment,
            'mid_exam' => $mid_exam,
            'final_exam' => $final_exam,
        ]);

        if($insertData){
            return redirect()->route('students.detail', $student_id);
        }
        return back()->withInput();
    }

    public function predictScore($id, ScorePredictionService $classifier){
        // $classifier = ScorePredictionService::class;

        $scores = Scores::where('student_id', $id)->get();
        $attendance = $scores->avg('attendance');
        $assignment = $scores->avg('assignment');
        $mid_exam = $scores->avg('mid_exam');
        $final_exam = $scores->avg('final_exam');

        $result = $classifier->predict($attendance, $assignment, $mid_exam, $final_exam);

        $student = Students::where('id', $id)->first();
        $update['prediction'] = $result;
        $student->update($update);

        return redirect()->route('students.detail', $id);
    }
}
