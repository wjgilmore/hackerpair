<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class EventStoreRequest extends FormRequest
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

        return [
            'name'          => 'required|min:10|max:50',
            'max_attendees' => 'required|integer',
            'start_date'    => 'required',
            'start_time'    => 'required',
            'description'   => 'required'
        ];
    }

    public function messages()
    {

        return [
            'required'                     => 'Please provide an event :attribute',
            'max_attendees.required'       => 'What is the maximum number of attendees allowed to attend your event?',
            'name.min'                     => 'Event names must consist of at least 10 characters',
            'name.max'                     => 'Event names cannot be longer than 50 characters',
            'start_date.required'          => 'Please provide an event date',
            'start_time.required'          => 'Please provide an event starting time'
        ];

    }

}
