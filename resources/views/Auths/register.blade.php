@extends('layouts.index')

@section('content')
<form action="{{ route('registerPost') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name') }}"
            class="form-control @error('name') is-invalid @enderror"
            required
        >
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror"
            required
        >
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            class="form-control @error('password') is-invalid @enderror"
            required
        >
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation">Confirm Password</label>
        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="form-control"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Register
    </button>
</form>
@endsection
