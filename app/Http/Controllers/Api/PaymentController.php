<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
          $payments = Payment::all();
          return response()->json($payments);
    }

    public function store(Request $request){
          $payment = Payment::create($request->all());
          return response()->json($payment);
    }
      public function show($id){
          $payment = Payment::find($id);
          return response()->json($payment);
    }
    public function update(Request $request, $id){
          $payment = Payment::find($id);
          $payment->update($request->all());
          return response()->json($payment);
    }
    public function delete($id){
          $payment = Payment::find($id);
          $payment->delete();
          return response()->json(['message' => 'Payment deleted successfully']);
    }
   
}
