@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center mt-5">
        <h1>Welcome to the Notes App</h1>
        <p class="lead">Here, you can manage all your notes.</p>

        <a href="{{ route('notes.index') }}" class="btn btn-primary btn-lg">Go to My Notes</a>
    </div>
@endsection
