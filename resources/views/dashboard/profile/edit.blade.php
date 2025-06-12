{{-- @extends('dashboard.dashboard') --}}

@section('contact')
  <style>
  body {
    background-color: #f5f9fc;
    color: #1a1a2e;
    font-family: 'Segoe UI', sans-serif;
  }

  .card {
    background-color: #ffffff;
    border: 1px solid #dce3ec;
    box-shadow: 0 4px 10px rgba(0, 0, 50, 0.05);
    border-radius: 12px;
  }

  .card-title {
    color: #0b2447;
  }

  .form-label {
    color: #0b2447;
    font-weight: 500;
  }

  .form-control {
    border-radius: 8px;
    border: 1px solid #ccc;
  }

  .form-control:focus {
    border-color: #0b2447;
    box-shadow: 0 0 0 0.2rem rgba(11, 36, 71, 0.2);
  }

  .btn-primary {
    background-color: #3b87f1;
    border-color:  #3b87f1;;
    border-radius: 8px;
  }

  .btn-primary:hover {
    background-color: #19376d;
    border-color: #19376d;
  }

  .btn-secondary {
    background-color: #e0e5ec;
    color: #0b2447;
    border-radius: 8px;
  }

  .btn-secondary:hover {
    background-color: #cfd6e1;
    color: #0b2447;
  }
</style>
<div class="container mt-5" style="max-width: 500px;">
    <h2>Edit Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name', $user->name) }}" 
                required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $user->email) }}" 
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>

