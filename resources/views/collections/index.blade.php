@extends('layouts.app')

@section('content')
    <h1>Library Collections</h1>
    <a href="{{ route('collections.create') }}" class="btn btn-primary mb-3">Add Collection</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Physical</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $collection)
                <tr>
                    <td>{{ $collection->id }}</td>
                    <td>{{ $collection->title }}</td>
                    <td>{{ $collection->type }}</td>
                    <td>{{ $collection->is_physical ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('collections.edit', $collection) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('collections.destroy', $collection) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $collections->links() }}
@endsection