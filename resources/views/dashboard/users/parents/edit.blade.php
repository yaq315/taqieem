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
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Parent</h5>
            <form method="POST" action="{{ route('users.parents.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('users.parents') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

