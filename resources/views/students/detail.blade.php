@extends('layouts.master')
@section('title', 'Detail Student')

@section('content')
    @include('layouts.navbar')
    <div class="container">
        <h3>Name : {{ $data['name'] }}</h3>
        <ul class="list-group">
            @foreach ($data['score'] as $score)
                @php
                    if ($score >= 90) {
                        $grade = 'A';
                    } elseif ($score >= 85) $grade = 'A-';
                        elseif ($score >= 80) $grade = 'B+';
                        elseif ($score >= 75) $grade = 'B';
                        elseif ($score >= 70) $grade = 'B-';
                        elseif($score >= 65) $grade = 'C';
                        elseif($score >= 60) $grade = 'D';
                        else $grade = 'E';
                @endphp

                <li class="list-group-item">
                    Score : {{ number_format($score, 2) }} - Grade : {{ $grade }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
