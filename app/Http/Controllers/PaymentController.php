<?php

namespace App\Http\Controllers;

use App\Models\UserPaymentHistory;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //get all Payments
    public function getAllPayments()
    {
        $payments = UserPaymentHistory::all();
        return view('payment.index',compact('payments'))->with('no',1);
    }
}