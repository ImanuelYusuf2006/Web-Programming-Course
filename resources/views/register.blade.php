@extends('layouts.master')
@section('title', 'Register Page')

@section('content')
    <div class="row">
        <div class="col-6 bg-secondary">

        </div>
        <div class="d-flex col-6 vh-100 items-center justify-content-center">
            <div class="card p-4 m-5" style="width: 400px">
                <h2>Register</h2>
                <form action="{{ route('register.do') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label>Username</label>
                        <input value="{{ old('username') }}" name="username" type="text" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label>Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control">
                    </div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            {{ session('error_message') }}
                            <ul class="mb-8">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <x-error_message></x-error_message>
                    <button type="submit" href="{{ route('register') }}" class="btn btn-primary mt-2">Register</button>
                    {{-- <button type="submit" href="{{ route('login') }}" class="btn btn-primary mt-2">Login</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection

</html>
