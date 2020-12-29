<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'city_id' => 'required',
            'email' => 'nullable|email',
            'date' => 'required',
            'branch_id' => 'required',
            'code' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'payment_status' => 'required',
            'user_id' => 'nullable',
            'details' => 'nullable',
            'comments' => 'nullable',
        ];
    }
}
