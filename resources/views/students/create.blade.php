@extends('layouts.master')
@section('title', 'Add New Student')

@section('content')
    @include('layouts.navbar')
    <div class="container mt-4">
        <div class="card p-4">
            <form action="{{ route('students.insert') }}" method="POST">
                @csrf
                <div>
                    <label class="form-label">Student Name</label>
                    <input type="text" name="student_name" class="form-control" id="student_name">
                </div>
                <div>
                    <label class="form-label">Student Number</label>
                    <input type="text" name="student_nim" class="form-control" id="student_nim">
                </div>
                @include('components.error_message')
                <button type="submit" class="btn btn-danger mt-4">Add Student</button>
            </form>
        </div>
    </div>
@endsection
