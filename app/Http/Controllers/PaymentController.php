<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index(){
           $payments=Payment::all();
         return Inertia::render('payments.index',compact('payments'));
    }

    public function create(){
        return Inertia::render('payments.create');
    }
 
    public function store(Request $request){
       Payment::create($request->all());
       return redirect()->route('payments.index');
    }

    public function destroy(Payment $payment){
        $payment->delete();
        return redirect()->back();
    }

    public function edit(Payment $payment){
        return Inertia::render('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment){
        $payment->update($request->all());
        return redirect()->route('payments.index');
    }

    public function show(Payment $payment){
        return Inertia::render('payments.show', compact('payment'));
    }
      

}
