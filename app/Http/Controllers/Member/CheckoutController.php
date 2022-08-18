<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CheckoutRequest;
use App\Mail\AfterCheckout;
use App\Models\Camp;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Camp $camp)
    {
        // //
        // return view(
        //     'member.cart.checkout',
        //     [
        //         'camp' => $camp,
        //     ]
        // );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Camp $camp)
    {
        //
        return view(
            'member.cart.checkout',
            [
                'camp' => $camp,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request, Camp $camp)
    {
        if ($camp->isRegistered) {
            $request->session()->flash('error', "Maaf, Anda Sudah Terdapat pada course {$camp->title} ini.");
            return redirect()->route('member.index');
        }
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;
        // Proses Update data User
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->occupation = $data['occupation'];
        $user->save();
        // Proses Input data Checkout
        $checkout = Checkout::create($data);
        // sending email after checkout
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));
        if ($checkout) {
            //redirect dengan pesan sukses
            return redirect()->route('member.checkout.success')->with(['success' => 'Checkout Berhasil, Terima Kasih atas pembelian kelas ini !']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('member.checkout')->with(['error' => 'Checkout Gagal Harap Periksa Data Anda!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
    public function success()
    {
        return view('member.cart.checkout-success');
    }
    public function invoice(Checkout $checkout)
    {
        return $checkout;
    }
}
