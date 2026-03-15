<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kebelie;
use Illuminate\Http\Request;

class KebelieController extends Controller
{
    public function index()
    {
        return "hello world";
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kebelies',
            'woreda_id'=>'required|exists:woredas,id'
        ]);
        Kebelie::create($request->all());
        return response()->json(['status'=>true,'message'=>'kebelie created successfully']);
    }

    public function getKebelie($id)
    {
        $kebelie=Kebelie::where('woreda_id',$id)->get();
        return response()->json(['status'=>true, 'data'=>$kebelie]);
    }

    public function show($id)
    {
        $kebelie=Kebelie::find($id);
        return response()->json(['status'=>true, 'data'=>$kebelie]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:kebelies,name,'.$id,
            'woreda_id'=>'required|exists:woredas,id'
        ]);
        $kebelie=Kebelie::find($id);
        $kebelie->update($request->all());
        return response()->json(['status'=>true, 'message'=>'kebelie updated successfully']);
    }

    public function destroy($id)
    {
        $kebelie=Kebelie::find($id);
        $kebelie->delete();
        return response()->json(['status'=>true, 'message'=>'kebelie deleted successfully']);
    }
    
}
