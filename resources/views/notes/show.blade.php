@extends('layouts.app')

@section('title', 'View Note')

@section('content')
    <h1>{{ $note->title }}</h1>
    <p><strong>Content:</strong> {{ $note->content }}</p>
    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back to Notes</a>
    <a href="{{ route('notes.edit', $note) }}" class="btn btn-primary">Edit Note</a>
    <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure you want to delete this note?')">Delete Note</button>
    </form>
@endsection
