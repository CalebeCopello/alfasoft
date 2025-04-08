<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Contact
        </h2>
    </x-slot>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> Fix the following issues:
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('contacts.update', $contact->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $contact->name)}}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact (9 digits)</label>
                <input
                    type="text"
                    class="form-control @error('contact') is-invalid @enderror"
                    id="contact"
                    name="contact"
                    value="{{ old('contact', $contact->contact) }}"
                    required
                >
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email', $contact->email) }}"
                    required
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2 d-flex">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                <button type="submit" class="btn btn-primary  mr-2">Update</button>
                </form>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
    </div>
</x-app-layout>