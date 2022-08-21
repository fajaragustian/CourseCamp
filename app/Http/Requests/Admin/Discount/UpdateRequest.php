<?php

namespace App\Http\Requests\Admin\Discount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->userRole->role_id == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string',
            // membuat excaption jika data unique tapi tidak masalah jika id sama
            'code' => 'required|string|unique:discounts,code,' . $this->id . ',id',
            'desc' => 'nullable|string',
            'percentage' => 'required|numeric|min:1|max:100',
        ];
    }
}
