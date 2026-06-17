<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function showRegister(){
        return view('register');
    }

    public function login(Request $request){
        // $username = $request->input('username');
        // $password = $request->input('password');

        $validated = $request->validate([
            'username' => 'required|email',
            'password' => ['required', 'min:3', 'max:20',
                Password::min(3)->max(20)->mixedCase()->symbols()],
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ], [
            'username.required' => 'Email tidak boleh kosong',
            'username.email' => 'Username harus berbentuk email'
        ]);

        return redirect()->route('home');

        // if($username != '' && $password != ''){
        //     return redirect()->route('home');
        // } else{
        //     return back()->withInput()->with('error_message', 'Username and Password must be field');
        // }
    }

    public function register(Request $request){
        $validated = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required', 'confirmed',
            Password::min(3)->max(20)->mixedCase()->symbols()],
        ]);

        return redirect()->route('home');
    }

    public function val(Request $request){
        $validated = $request->validate([
            'total_student' => ['same:class_capacity'],
            'class_date' => ['after:today'],
            'class_image' => ['image', 'mimes:png,jpg', 'max:2048'],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
