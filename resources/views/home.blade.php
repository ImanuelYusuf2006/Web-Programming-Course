@extends('layouts.master')
@section('title', 'Home Page')

@section('content')
@include('layouts.navbar')
    <div class="container">
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
                            $average = array_sum($student['score']) / count($student['score']);
                        @endphp

                        <td>{{ number_format($average, 5) }}</td>
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