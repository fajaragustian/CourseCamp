<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Camp $camp)
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camp $camp)
    {
        //
        // $camp = Camp::all();
        // $user = Auth::id();
        // return view(
        //     'member.cart.checkout',
        //     compact('camp', 'user')
        // );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Camp $camp)
    {
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
}
