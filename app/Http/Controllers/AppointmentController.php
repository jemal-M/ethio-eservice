<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = \App\Models\Appointment::all();
        return Inertia::render('appointment.index',['appointments'=>$appointments]);
    }

    public function create()
    {
        return Inertia::render('appointment.create');
    }

    public function store(Request $request)
    {
        $appointment = new \App\Models\Appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->service = $request->service;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        return redirect('/appointment');
    }

    public function destroy($id)
    {
        $appointment = \App\Models\Appointment::find($id);
        $appointment->delete();

        return redirect('/appointment');
    }

    public function edit($id)
    {
        $appointment = \App\Models\Appointment::find($id);
        return Inertia::render('appointment.edit', ['appointment'=>$appointment]);
    }

    public function update(Request $request, $id)
    {
        $appointment = \App\Models\Appointment::find($id);
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->service = $request->service;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        return redirect('/appointment');
    }

    public function show($id)
    {
        $appointment = \App\Models\Appointment::find($id);
        return Inertia::render('appointment.show', ['appointment'=>$appointment]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $appointments = \App\Models\Appointment::where('name', 'like', '%'.$search.'%')->get();
        return Inertia::render('appointment.index', ['appointments'=>$appointments]);
    }

    public function filter(Request $request)
    {
        $filter = $request->get('filter');
        $appointments = \App\Models\Appointment::where('service', 'like', '%'.$filter.'%')->get();
        return Inertia::render('appointment.index', ['appointments'=>$appointments]);
    }
     
    public function sort(Request $request)
    {
        $sort = $request->get('sort');
        if($sort == 'name')
        {
            $appointments = \App\Models\Appointment::orderBy('name')->get();
        }
        else if($sort == 'date')
        {
            $appointments = \App\Models\Appointment::orderBy('date')->get();
        }
        else if($sort == 'time')
        {
            $appointments = \App\Models\Appointment::orderBy('time')->get();
        }
        return Inertia::render('appointment.index', ['appointments'=>$appointments]);
    }
    

}
