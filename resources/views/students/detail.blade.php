@extends('layouts.master')
@section('title', 'Detail Student')

@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="card mt-2">
            <div class="card-body">
                <h2 class="h5">Name : {{ $data['name'] }}</h2>
                <h2 class="h5">NIM : {{ $data['nim'] }}</h2>
                <h2 class="h5">Status : {{ $data['prediction'] }}</h2>
                <form action="" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-info">Predict Status</button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h2 class="h5">Add Score</h2>
                <form action="{{ route('students.scores.insert') }}" method="POST" class="row">
                    @csrf
                    <input name="student_id" type="hidden" value="{{ $data['id'] }}">
                    <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Course</label>
                        <select name="course_id" class="form-control" required>
                            <option value="" disabled selected>-- Select Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Attendance Percentage (0 - 100)</label>
                        <input type="number" name="attendance" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Assignment (0 - 100)</label>
                        <input type="number" name="assignment" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Mid Exam (0 - 100)</label>
                        <input type="number" name="mid_exam" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Final Exam (0 - 100)</label>
                        <input type="number" name="final_exam" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Score (0 - 100)</label>
                        <input type="number" name="score" class="form-control" min="0" max="100" required>
                    </div>
                </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-success">Save Score</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Course</th>
                            <th>Attendance</th>
                            <th>Assignment</th>
                            <th>Mid Exam</th>
                            <th>Final Exam</th>
                            <th>Score</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                            @php
                                if ($score->score >= 90) {
                                    $grade = 'A';
                                } elseif ($score->score >= 85) {
                                    $grade = 'A-';
                                } elseif ($score->score >= 80) {
                                    $grade = 'B+';
                                } elseif ($score->score >= 75) {
                                    $grade = 'B';
                                } elseif ($score->score >= 70) {
                                    $grade = 'B-';
                                } elseif ($score->score >= 65) {
                                    $grade = 'C';
                                } elseif ($score->score >= 60) {
                                    $grade = 'D';
                                } else {
                                    $grade = 'E';
                                }
                            @endphp

                            {{-- <li class="list-group-item">
                                Score : {{ number_format($score->score, 2) }} - Grade : {{ $grade }}
                            </li> --}}
                            <tr>
                                <td>{{ $score->course->code }} - {{ $score->course->name }}</td>
                                <td>{{ $score->attendance }}%</td>
                                <td>{{ $score->assignment }}</td>
                                <td>{{ $score->mid_exam }}</td>
                                <td>{{ $score->final_exam }}</td>
                                <td>{{ $score->score }}</td>
                                <td>{{ $grade }}</td>
                                <td>Action</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
