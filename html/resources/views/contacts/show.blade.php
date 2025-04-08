<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Details
        </h2>
    </x-slot>
    <div class="container">
        <div class="card mb-3 mt-2">
            <div class="card-body">
                <h4 class="card-title">{{$contact->name}}</h4>
                <p class="card-text"><strong>ID: </strong>{{$contact->id}}</p>
                <p class="card-text"><strong>Contact Number: </strong>{{$contact->contact}}</p>
                <p class="card-text"><strong>Email: </strong>{{$contact->email}}</p>
                <p class="card-text"><strong>Created At: </strong>{{$contact->created_at->toDayDateTimeString()}}</p>
                <p class="card-text"><strong>Updated At: </strong>{{$contact->updated_at->toDayDateTimeString()}}</p>
            </div>
        </div>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this contact?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</x-app-layout>