@extends('layouts.app')

@section('content')
    <h1>Access Requests</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Collection</th>
                <th>User</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->collection->title }}</td>
                    <td>{{ $request->user_id }}</td>
                    <td>{{ $request->status }}</td>
                    <td>
                        @if ($request->status === 'pending')
                            <form action="{{ route('access-requests.approve', $request) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('access-requests.reject', $request) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $requests->links() }}
@endsection
