<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');  // Make sure you have a login.blade.php file in the 'auth' folder
    }

    // Handle login logic
    public function login(Request $request)
    {
        // Validate email and password input
        $credentials = $request->validate([
            'email' => ['required', 'email'],  // This allows any valid email
            'password' => ['nullable'],
        ]);

        // Attempt to log in with provided credentials
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect the user to the designations page after successful login
            return redirect()->intended('/designations/create');
        }

        // If authentication fails, return back to the login form with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle logout logic
    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session and regenerate the token to prevent CSRF attacks
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user to the login page
        return redirect('/login');
    }
}
