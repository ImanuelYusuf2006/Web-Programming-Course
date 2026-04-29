@extends('layouts.master')
@section('title', 'Login Page')

@section('content')
    <div class="row">
        <div class="col-6 bg-secondary">

        </div>
        <div class="d-flex col-6 vh-100 items-center justify-content-center">
            <div class="card p-4 m-5" style="width: 400px">
                <h2>Login</h2>
                <form>
                    <div class="mt-2">
                        <label>Username</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-1">
                        <input type="checkbox">
                        <label class="form-label m-0">Remember Me</label>
                    </div>
                    <a href="">Forgot Password</a>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('login') }}" class="btn btn-primary mt-2">Login</a>
                    <a href="{{ route('register.view') }}" class="btn btn-primary mt-2">Register Now</a>
                </div>
            </div>
        </div>
        <a href="{{ route('home') }}">Home Page</a>
    </div>
@endsection

</html>
