<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Register FUnction
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    // Login function
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'emailNotFound' => 'Email not registered.',
            ]);
        }

        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->back()->withErrors([
                'passwordIncorrect' => 'Incorrect password.',
            ]);
        }

        return redirect()->intended('dashboard');
    }

    // Forgot password function
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'emailNotFound' => 'Email not registered.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('status', 'Password has been update successfully');
    }
}
