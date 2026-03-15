<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
     public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }
   
    public function store(Request $request){
        $appointment=Appointment::create($request->all());
        return response()->json($appointment);
    }

    public function show($id){
        $appointment=Appointment::find($id);
        return response()->json($appointment);
    }

    public function update(Request $request, $id){
        $appointment=Appointment::find($id);
        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy($id){
        $appointment=Appointment::find($id);
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }
       
}
