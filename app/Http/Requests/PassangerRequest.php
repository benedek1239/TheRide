<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassangerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
              'start_ride' => 'required',
              'finish_ride' => 'required',
              'ridePassanger_date' => 'required|date|nullable',
        ];
    }
}
