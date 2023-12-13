@extends('layouts.main')
@section('page-title')
    User List
@endsection
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>User List</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }} {{ $user->surname }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->date)->format('l jS \of F Y h:i:s A') }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
            <!-- Repeat this block for each user -->
        </tbody>
    </table>
@endsection
