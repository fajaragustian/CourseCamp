<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CheckoutRequest;
use App\Mail\AfterCheckout;
use App\Models\Camp;
use App\Models\Checkout;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Midtrans;

class CheckoutController extends Controller
{
    // mendeskripsikan config midtrans
    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY ');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION ');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED ');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS ');
    }

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
        $this->getSnapRedirect($checkout);
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
    // public function invoice(Checkout $checkout)
    // {
    //     return $checkout;
    // }
    // snap redirect midtrans
    public function getSnapRedirect(Checkout $checkout)
    {
        $price = $checkout->Camp->price;
        $orderId = $checkout->id . '-' . Str::random(5);
        $checkout->midtrans_booking_code = $orderId;
        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $price
        ];
        $item_details = [
            "id" => $orderId,
            "price" => $price,
            "quantity" => 1,
            "name" => "Payment for course {$chekout->Camp->title}",
            "brand" => "Course Camp",
            "category" => "Digital Course ",
            "merchant_name" => "Course Camp",
        ];
        $customerDetails = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "email" => $checkout->User->email,
            "phone" => $checkout->User->phone,
            "billing_address" => $userData,
            "shipping_address" => $userData,
        ];
        // adding for shipping address dan billing address
        $userData = [
            "first_name" => $checkout->User->name,
            "last_name" => "",
            "email" => $checkout->User->email,
            "phone" => $checkout->User->phone,
            "address" => $checkout->User->address,
            "city" => "",
            "postal_code" => "",
            "country_code" => "IDN",
        ];
        // grouping rules midtrans Customer Details,Billing and Shipping Address
        $midtrans_parameters = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customerDetails,
            'item_details' => $item_details,
        ];
        // processing get snap Page Url
        try {
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_parameters)->redirect_url;
            // Jika dapat datanya
            $checkout->midtrans_url = $paymentUrl;
            $checkout->save();
            //
            return $paymentUrl;
        } catch (Exception $e) {
            return  false;
        }
    }
}
