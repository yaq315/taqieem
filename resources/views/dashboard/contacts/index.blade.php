@extends('dashboard.dashboard')

@section('contact')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Contact Messages</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">Email</th>
                            <th class="border-bottom-0">Subject</th>
                            <th class="border-bottom-0">Sent Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td class="border-bottom-0">{{ $loop->iteration }}</td>
                            <td class="border-bottom-0">{{ $contact->name }}</td>
                            <td class="border-bottom-0">{{ $contact->mail }}</td>
                            <td class="border-bottom-0">{{ $contact->subject }}</td>
                            <td class="border-bottom-0">{{ $contact->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
