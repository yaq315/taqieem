@extends('dashboard.dashboard')

@section('contact')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Manage Parents</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">Phone</th>
                            <th class="border-bottom-0">Email</th>
                            <th class="border-bottom-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parents as $parent)
                        <tr>
                            <td class="border-bottom-0">{{ $loop->iteration }}</td>
                            <td class="border-bottom-0">{{ $parent->name }}</td>
                            <td class="border-bottom-0">{{ $parent->phone }}</td>
                            <td class="border-bottom-0">{{ $parent->email }}</td>
                            <td class="border-bottom-0">
                                <a href="{{ route('users.parents.edit', $parent->id) }}" class="btn btn-sm btn-primary">
                                    <i class="ti ti-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $parents->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
