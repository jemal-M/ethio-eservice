<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegionController extends Controller
{
    public function index()
    {
        $regions=Region::all();
        return Inertia::render('region.index',['regions'=>$regions]);
    }

    public function create()
    {
        return Inertia::render('region.create');
    }

    public function edit($id)
    {
        $region=Region::find($id);
        return Inertia::render('region.edit', ['id' => $id,'region'=>$region]);
    }

    public function show($id)
    {
        $region=Region::find($id);
        return Inertia::render('region.show', ['id' => $id, 'region'=>$region]);
    }
   
    public function store(Request $request)
    {
        Region::create($request->validate([
            'name'=>['required'],
            'code'=>['required']
        ]));
        return redirect()->route('region.index');
    }

    public function update(Request $request, $id)
    {
        $region=Region::find($id);
        $region->update($request->validate([
            'name'=>['required'],
            'code'=>['required']
        ]));
        return redirect()->route('region.index');
    }

}
