<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        $appointments=Appointment::all();
        return response()->json($appointments);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'date'=>'required|date',
            'service'=>'required'
        ]);
        $appointment=Appointment::create($request->all());
        return response()->json($appointment);
    }

    public function show(Appointment $appointment){
        return response()->json($appointment);
    }

    public function update(Request $request,Appointment $appointment){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'date'=>'required|date',
            'service'=>'required'
        ]);
        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy(Appointment $appointment){
        $appointment->delete();
        return response()->json(null,204);
    }
    
}
