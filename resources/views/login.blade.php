@extends('layouts.master')
@section('title', 'Login Page')

@section('content')
    <div class="row">
        <div class="col-6 bg-secondary">

        </div>
        <div class="d-flex col-6 vh-100 items-center justify-content-center">
            <div class="card p-4 m-5" style="width: 400px">
                <h2>Login</h2>
                <form action="{{ route('login.do') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label>Username</label>
                        <input value="{{ old('username') }}" name="username" type="text" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label>Password</label>
                        <input value="{{ old('password') }}" name="password" type="password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-1">
                            <input type="checkbox">
                            <label class="form-label m-0">Remember Me</label>
                        </div>
                        <a href="">Forgot Password</a>
                    </div>
                    @if (session('error_message'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error_message') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <button type="submit" href="{{ route('login') }}" class="btn btn-primary mt-2">Login</button>
                        <button type="submit" href="{{ route('register') }}" class="btn btn-primary mt-2">Register
                            Now</button>
                    </div>
                </form>
                <a href="{{ route('home') }}">Home Page</a>
            </div>
        </div>
    </div>
@endsection

</html>
