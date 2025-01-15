<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        Admin::create($request->all());
        return redirect()->route('admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index');
    }

    public function dashboard()
    {
        if (Session::get('auth_type') !== 'admin') {
            return redirect()->route('login');
        }

        $admin = Admin::find(Session::get('auth_user'));
        return view('admin.dashboard', compact('admin'));
    }
}
