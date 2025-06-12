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
      <h5 class="card-title fw-semibold mb-4">Edit School</h5>
      <form method="POST" action="{{ route('schools.update', $school->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">School Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $school->name) }}" required>
        </div>
        <div class="mb-3">
          <label for="location" class="form-label">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $school->location) }}" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $school->description) }}</textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">School Image</label>
          <input type="file" class="form-control" id="image" name="image">
          @if($school->image)
            <div class="mt-2">
              <img src="{{ asset('images/' . $school->image) }}" alt="School Image" width="150">
            </div>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('schools.manage') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>



