<?php

namespace App\Http\Controllers;

use App\Models\Auditlog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuditlogController extends Controller
{
    public function index()
    {
        $auditlogs = Auditlog::all();
        return Inertia::render('auditlog.index',['auditlogs'=>$auditlogs]);
    }
     public function create()
    {
         return Inertia::render('auditlog.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'action' => 'required',
            'user' => 'required',
            'description' => 'required'
              
            
        ]);
        Auditlog::create($request->all());
        return redirect('/auditlog');
    }
    public function destroy(Auditlog $auditlog)
    {
        $auditlog->delete();
        return redirect('/auditlog');
    }

    public function edit(Auditlog $auditlog)
    {
        unset($auditlog['created_at']);
        unset($auditlog['updated_at']);
        unset($auditlog['deleted_at']);
        unset($auditlog['user']);
        unset($auditlog['description']);

        return Inertia::render('auditlog.edit', ['auditlog'=>$auditlog]);
    }
    public function update(Request $request, Auditlog $auditlog)
    {
        $request->validate([
            'action' => 'required',
            'user' => 'required',
            'description' => 'required'


        ]);
        $auditlog->update($request->all());
        return redirect('/auditlog');
    }

    public function show(Auditlog $auditlog)
    {
        unset($auditlog['created_at']);
        unset($auditlog['updated_at']);
        unset($auditlog['deleted_at']);
        unset($auditlog['user']);
        unset($auditlog['description']);
        return Inertia::render('auditlog.show', ['auditlog'=>$auditlog]);
    }
    public function search(Request $request){
        $search=$request->get('search');
        $auditlogs=Auditlog::where('action','like','%'.$search.'%')->get();
        return Inertia::render('auditlog.index', ['auditlogs'=>$auditlogs]);
    }
     public function filter(Request $request){
        $from=$request->get('from');
        $to=$request->get('to');
        $auditlogs=Auditlog::whereBetween('created_at', array($from, $to))->get();
        return Inertia::render('auditlog.index', ['auditlogs'=>$auditlogs]);
    }
 

}
