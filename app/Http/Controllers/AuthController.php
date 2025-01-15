<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Librarian;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user is an Admin
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('auth_type', 'admin');
            Session::put('auth_user', $admin->id);
            return redirect()->route('admin.dashboard'); // Replace with your admin dashboard route
        }

        // Check if the user is a Librarian
        $librarian = Librarian::where('email', $request->email)->first();
        if ($librarian && Hash::check($request->password, $librarian->password)) {
            Session::put('auth_type', 'librarian');
            Session::put('auth_user', $librarian->id);
            return redirect()->route('librarian.dashboard'); // Replace with your librarian dashboard route
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
