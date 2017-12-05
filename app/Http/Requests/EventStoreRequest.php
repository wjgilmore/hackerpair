<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'name'          => 'required|min:10|max:50',
            'max_attendees' => 'required|integer|digits_between:2,5',
            'description'   => 'required'
        ];
    }

    public function messages()
    {

        return [
            'required' => 'Please provide an event :attribute',
            'max_attendees.required' => 'What is the maximum number of attendees allowed to attend your event?',
            'name.min' => 'Event names must consist of at least 10 characters',
            'name.max' => 'Event names cannot be longer than 50 characters',
            'max_attendees.digits_between' => 'We try to keep events cozy, consisting of between 2 and 5 attendees, including you.'
        ];

    }

}
