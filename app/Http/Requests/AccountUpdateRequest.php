<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() == $this->route('account');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'         => 'required',
            'last_name'          => 'required',
            'email'              => 'required|email',
            'zip'                => 'required'
        ];
    }

    public function messages()
    {
        return [
          'first_name.required' => 'Please provide your first name',
          'last_name.required'  => 'Please provide your last name',
          'email.required'      => 'Please provide your e-mail address',
          'zip.required'        => 'Please provide your zip code. We use it to provide localized results'
        ];
    }

}
