<?php

namespace App\Http\Controllers;

use App\Models\Kebelie;
use App\Models\Woreda;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KebelieController extends Controller
{
    public function index()
    {
        $kebelies=Kebelie::all();
        return Inertia::render('kebelie.index',['kebelies'=>$kebelies]);
    }

    public function create()
    {
         $woredas=Woreda::all();
        return Inertia::render('kebelie.create',['woredas'=>$woredas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'woreda_id'=>'required'
        ]);
        Kebelie::create($request->all());
        return redirect()->back();
    }

    public function edit(Kebelie $kebelie)
    {
        $woredas=Woreda::all();
        return Inertia::render('kebelie.edit',['kebelie'=>$kebelie,'woredas'=>$woredas]);
    }

    public function update(Request $request, Kebelie $kebelie)
    {
        $request->validate([
            'name'=>'required',
            'woreda_id'=>'required'
        ]);
        $kebelie->update($request->all());
        return redirect()->back();
    }

    public function destroy(Kebelie $kebelie)
    {
        $kebelie->delete();
        return redirect()->back();
    }

    public function show(Kebelie $kebelie)
    {
        return Inertia::render('kebelie.show',['kebelie'=>$kebelie]);
    }

    public function getKebelie($id)
    {
        $kebelies=Kebelie::where('woreda_id',$id)->get();
        return $kebelies;
    }
    
}
