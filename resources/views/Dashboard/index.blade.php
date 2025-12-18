@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>User List</h4>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($UserList as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $user->created_by ?? 'Admin' }}</td> {{-- Optional --}}
                    <td>
                        <a href="{{ route('editUser', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        {{-- You can add delete button here if needed --}}
                        <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete
                    </button>
                </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
