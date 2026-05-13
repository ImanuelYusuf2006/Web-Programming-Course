@extends('layouts.master')
@section('title', 'Home Page')

@section('content')
@include('layouts.navbar')
    <div class="container">
        <a href="{{ route('students.create') }}" class="btn btn-primary my-4">Add New Student</a>
        <table class="table table-dark table-hover">
            
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Average Score</th>
                    <th>Status</th>
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
                                <span class="badge bg-success">Lulus</span>
                            @else
                                <span class="badge bg-danger">Tidak Lulus</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection