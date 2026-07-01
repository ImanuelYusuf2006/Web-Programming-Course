@extends('layouts.master')
@section('title', 'Home Page')

@section('content')
@include('layouts.navbar')
    <div class="container">
        <a href="{{ route('students.create') }}" class="btn btn-primary my-4">Add New Student</a>
        <table class="table table-bordered">
            
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Average Score</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('students.detail', ['id' => $student['id']]) }}">{{ $student['name'] }}</a></td>

                        @php
                            $average = $student->getAverage()
                        @endphp

                        <td>{{ $average }}</td>
                        <td>
                            @if ($average > 90)
                                <span class="badge bg-success">{{ __('main.student.status_oke') }}</span>
                            @else
                                <span class="badge bg-danger">{{ __('main.student.status_fail') }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('students.edit', $student['id']) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('students.delete', $student['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete Student Data?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection