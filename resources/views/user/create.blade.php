@extends('layouts.main')
@section('page-title')
    {{ isset($user) ? 'Edit User' : 'Create User' }}
@endsection
@section('content')
    <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>

    <form action="{{ route('user.store') }}" method="post">
        @csrf


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ isset($user) ? explode(' ', $user['name'])[0] : old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @isset($user)
            <input type="hidden" name="user_id" value="{{ $user->id }}">
        @endisset

        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname"
                value="{{ isset($user) ? explode(' ', $user['name'])[1] : old('surname') }}" required>
            @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ isset($user) ? $user->email : old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ isset($user) ? $user->address : old('address') }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone"
                value="{{ isset($user) ? $user->phone : old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date"
                name="date" value="{{ isset($user) ? date('Y-m-d\TH:i', strtotime($user->date)) : old('date') }}"
                required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>
    </div>
@endsection
