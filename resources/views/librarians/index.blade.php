@extends('layouts.app')

@section('content')
    <h1>Librarians</h1>
    <a href="{{ route('librarians.create') }}" class="btn btn-primary mb-3">Add Librarian</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($librarians as $librarian)
                <tr>
                    <td>{{ $librarian->id }}</td>
                    <td>{{ $librarian->name }}</td>
                    <td>{{ $librarian->email }}</td>
                    <td>
                        <form action="{{ route('librarians.destroy', $librarian) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection