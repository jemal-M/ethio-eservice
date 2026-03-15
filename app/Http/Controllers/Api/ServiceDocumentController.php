<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceDocument;
use Illuminate\Http\Request;

class ServiceDocumentController extends Controller
{
      public function index(){
       $service_documents= ServiceDocument::all();
        return response()->json($service_documents);
      }

      public function show(ServiceDocument $service_document){
        return response()->json($service_document);
      }

      public function store(Request $request){
        $service_document= ServiceDocument::create($request->all());
        return response()->json($service_document,201);
      }

      public function update(Request $request, ServiceDocument $service_document){
        $service_document->update($request->all());
        return response()->json($service_document);
      }

      public function destroy(ServiceDocument $service_document){
        $service_document->delete();
        return response()->json(null, 204);
      }
     public function service_doc_by_service($service_id){
        $service_documents= ServiceDocument::where('service_id', $service_id)->get();
        return response()->json($service_documents);
     }
      
}
