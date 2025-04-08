@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Contact</h1>
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
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
</div>
@endsection