<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadDocumentController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('document');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('documents'), $filename);

        return response()->json(['message' => 'File uploaded successfully']);
    }
      public function index()
    {
        $files = glob(public_path('documents/*'));
        $filesInfo = [];

        foreach ($files as $file) {
            $filesInfo[] = [
                'name' => basename($file),
                'size' => filesize($file),
                'url' => asset('documents/' . basename($file)),
            ];
        }

        return response()->json($filesInfo);
    }

    public function destroy($filename)
    {
        $file_path = public_path('documents/' . $filename);

        if (file_exists($file_path)) {
            unlink($file_path);
            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);
    }
    
}
