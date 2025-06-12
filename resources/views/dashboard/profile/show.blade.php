@extends('dashboard.dashboard')

@section('contact')
<div class="container" style="margin-top: 150px; max-width: 600px;">
    <h2 class="mb-4 text-center">My Profile</h2>
    <div class="card p-4 shadow-sm">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="User Image" class="rounded-circle" width="120" height="120">
        </div>
        <h4 class="text-center mb-2">{{ $user->name }}</h4>
        <p class="text-center text-muted mb-4">{{ $user->email }}</p>
        <div class="text-center">
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary px-4">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
