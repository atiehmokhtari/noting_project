@extends('layouts.app')

@section('title', 'Add New Note')

@section('content')
    <h1>Add New Note</h1>
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save Note</button>
    </form>
@endsection
