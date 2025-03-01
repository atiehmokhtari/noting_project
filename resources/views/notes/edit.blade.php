@extends('layouts.app')

@section('title', 'Edit Note')

@section('content')
    <h1>Edit Note</h1>
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $note->title) }}" required>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Content Field -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $note->content) }}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update Note</button>
    </form>
@endsection
