@extends('layouts.app')

@section('title', 'My Notes')

@section('content')
    <div class="text-center mt-5">
        <h1>My Notes</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Add New Note</a>
        <div class="list-group">
            @foreach ($notes as $note)
                <a href="{{ route('notes.show', $note) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $note->title }}</h5>
                    <p class="mb-1">{{ \Illuminate\Support\Str::limit($note->content, 100) }}</p>
                    <small>{{date('d-m-Y H:i:s', strtotime($note->created_at)) }}</small>
                </a>
            @endforeach
        </div>
    </div>
@endsection
