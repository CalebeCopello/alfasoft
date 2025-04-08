<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    @auth
                        <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add New Contact</a>
                    @endauth
                    @if ($contacts->isEmpty())
                        <p>No contacts found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        @auth
                                        <th>Actions</th>
                                        @endauth
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->contact }}</td>
                                            <td>{{ $contact->email }}</td>
                                            @auth
                                            <td>
                                                <a href="{{ route('contacts.show', $contact) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            @endauth
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

