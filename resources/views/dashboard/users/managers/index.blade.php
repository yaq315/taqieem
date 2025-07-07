@extends('dashboard.layout.dash')

@section('content')
    <div class="container">
        <h2>Managers List</h2>

     @auth
    @if(auth()->user()->role === 'admin')
        <div class="mb-3">
            <a href="{{ route('users.managers.create') }}" class="btn btn-success">Add New Manager</a>
        </div>
    @endif
@endauth

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($managers as $manager)
                <tr>
                    <td>{{ $manager->name }}</td>
                    <td>{{ $manager->email }}</td>
                    <td>{{ $manager->phone }}</td>
                    <td>
                        <a href="{{ route('users.managers.edit', $manager->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $managers->links() }}
    </div>
@endsection
