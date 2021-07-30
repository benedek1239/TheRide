<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRideRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'price_cost' => 'regex:/^[0-9]+$/',
              'currency_type' => 'required',
              'formated_date' => 'required|date',
        ];
    }
}
