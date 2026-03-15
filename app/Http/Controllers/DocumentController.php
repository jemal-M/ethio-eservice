<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DocumentController extends Controller
{
     public function index()
    {
        $documents = Document::paginate(10);
        return Inertia::render('document.index');
    }

    public function create()
    {
        return Inertia::render('document.create');
    }

    public function store(Request $request)
    {
        Document::create($request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]));

        return redirect()->route('document.index');
    }

    public function show(Document $document)
    {
        return Inertia::render('document.show', [
            'document' => $document,
        ]);
    }

    public function edit(Document $document)
    {
        return Inertia::render('document.edit', [
            'document' => $document,
        ]);
    }

    public function update(Request $request, Document $document)
    {
        $document->update($request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]));

        return redirect()->route('document.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('document.index');
    }
      
}
