<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Checkout\AfterPaid;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminCheckoutController extends Controller
{
    // Admin Checkout Update to Paid
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();
        // send mail
        Mail::to($checkout->User->email)->send(new AfterPaid($checkout));
        $request->session()->flash('success', "Data Checkout {$checkout->id} telah berhasil di update ");
        return redirect()->route('admin.index');
    }
}
