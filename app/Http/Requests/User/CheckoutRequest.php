<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $expiredValidation = date('Y-m', time());
        return [
            // 'card_number' => 'required|numeric|digits_between:8,16',
            // // Validasi mencocokan bulan sekarang dan bulan sebelum, sehingga jika sudah expired tidak bisa di input
            // 'expired' => 'required|date|date_format:Y-m|after_or_equal:' . $expiredValidation,
            // 'cvc' => 'required|numeric|digits:3',
            'phone' => 'nullable|numeric|digits_between:12,13',
            'address' => 'required|string',
            // Exists pada table discount field code jika kode masih tersedia maka bisa terpakai namun jika delete discount maka tidak bisa
            'discount' => 'nullable|string|exists:discounts,code,deleted_at,NULL',
        ];
    }
}
