<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        showing the created notes for authenticated user
        $notes = auth()->user()->notes()->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        view of the creating new note
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        get the created record values and save it
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|string',
        ]);

        auth()->user()->notes()->create($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
//        showing each note in separate page
        if (Auth::id() !== $note->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
//        the edit view of a note
        if (Auth::id() !== $note->user_id) {
            abort(403, 'Unauthorized action.');
        }
        // $this->authorize('update', $note);
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
//        updat a note
        if (Auth::id() !== $note->user_id) {
            abort(403, 'Unauthorized action');
        }
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|string',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Note updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
//      deleting a not if user is verified
        if (Auth::id() !== $note->user_id) {
            abort(403, 'Unauthorized action');
        }
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}
