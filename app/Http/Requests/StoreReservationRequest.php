<?php

namespace App\Http\Requests;

use App\Rules\EmailCanReserve;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    protected $stopOnFirstFailure = false;

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
            'fname' => ['required','min:3','string'],
            'lname' => ['required','min:3','string'],
            'email' => ['required', 'email'],
            'phone_number' => ['required']
        ];
    }

    // create a validation rule to verify that the person who is sending the reservation request never reserved for this event before

    public function messages() {
        return [
            'email.unique' => 'A reservation has already been made with this email',
            'phone_number.unique' => 'A reservation has already been made with this phone number',
        ];
    }
}
