<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user_login.login_system');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_login.registration_system');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:logins,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required'],
        ]);
        if ($request->teacher_id == null) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'teacher_id' => null,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        };
        return redirect('/user-dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $cr)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $cr)
    {
        //
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Retrieve the user from the database based on the email
        // $user = Login::where('email', $email)->first();

        // Check if the user exists and if the provided password matches the hashed password
        // if ($user && password_verify($password, $user->password)) {
        //     $info = Login::where('email', $email)->first();
        //     return view('user_dashboard.index', compact('info'));
        // } else {
        //     return redirect('user/login')->with('password_error', 'Password is incorrect or user not found');
        // }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/user-dashboard');
        } else {
            return redirect('user/login')->with('password_error', 'Password is incorrect or user not found');
        }
    }
}
