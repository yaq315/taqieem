@extends('dashboard.dashboard')

@section('contact')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-semibold">School Management</h5>
                <a href="{{ route('schools.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i> Add New School
                </a>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">School Name</th>
                            <th class="border-bottom-0">Location</th>
                            <th class="border-bottom-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $school)
                        <tr>
                            <td class="border-bottom-0">{{ $loop->iteration }}</td>
                            <td class="border-bottom-0">{{ $school->name }}</td>
                            <td class="border-bottom-0">{{ $school->location }}</td>
                            <td class="border-bottom-0">
                                <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-sm btn-primary">
                                    <i class="ti ti-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $schools->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
