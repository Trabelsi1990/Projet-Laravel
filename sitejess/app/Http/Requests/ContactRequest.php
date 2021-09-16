<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Mail\Contact;
class ContactRequest extends FormRequest
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
            'nom' => 'bail|required|between:3,20|alpha',
            'email' => 'bail|required|email',
            'sujet'=>'bail|required|between:5,30',
            'message' => 'bail|required|max:250'
        ];
    }
}
