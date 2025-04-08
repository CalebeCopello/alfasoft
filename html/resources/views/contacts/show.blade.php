@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Details</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">{{$contact->name}}</h4>
            <p class="card-text"><strong>ID: </strong>{{$contact->id}}</p>
            <p class="card-text"><strong>Contact Number: </strong>{{$contact->contact}}</p>
            <p class="card-text"><strong>Email: </strong>{{$contact->email}}</p>
            <p class="card-text"><strong>Created At: </strong>{{$contact->created_at->toDayDateTimeString()}}</p>
        </div>
    </div>
    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection