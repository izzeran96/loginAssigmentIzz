@extends('layouts.dashboard')

@section('content')
<div class="container mt-4">
    <h4>User Activity</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Activity</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $activity)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $activity->activity }}</td>
                    <td>{{ $activity->ip_address ?? '-' }}</td>
                    <td>{{ $activity->user_agent ?? '-' }}</td>
                    <td>{{ $activity->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No activities yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
