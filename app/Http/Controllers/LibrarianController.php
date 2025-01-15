<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index()
    {
        $librarians = Librarian::all();
        return view('librarians.index', compact('librarians'));
    }

    public function create()
    {
        return view('librarians.create');
    }

    public function store(Request $request)
    {
        Librarian::create($request->all());
        return redirect()->route('librarians.index');
    }

    public function destroy(Librarian $librarian)
    {
        $librarian->delete();
        return redirect()->route('librarians.index');
    }

    public function dashboard()
    {
        if (Session::get('auth_type') !== 'librarian') {
            return redirect()->route('login');
        }

        $librarian = Librarian::find(Session::get('auth_user'));
        return view('librarian.dashboard', compact('librarian'));
    }
}
