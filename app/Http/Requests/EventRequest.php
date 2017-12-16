<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class EventRequest extends FormRequest
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
            'category_id'   => 'required|integer',
            'max_attendees' => 'required|integer',
            'start_date'    => 'required',
            'start_time'    => 'required',
            'oneliner'      => 'required|min:10|max:50',
            'description'   => 'required',
            'venue'         => 'required',
            'street'        => 'required',
            'city'          => 'required',
            'state_id'      => 'required|integer',
            'zip'           => 'required'
        ];
    }

    public function messages()
    {

        return [
            'required'                     => 'Please provide an event :attribute',
            'max_attendees.required'       => 'What is the maximum number of attendees allowed to attend your event?',
            'name.min'                     => 'Event names must consist of at least 10 characters',
            'name.max'                     => 'Event names cannot be longer than 50 characters',
            'oneliner.required'            => 'Please assign a one line event description',
            'oneliner.min'                 => 'The oneline description should consist of more than 10 characters',
            'oneliner.max'                 => 'The oneline description should consist of less than 50 characters',
            'start_date.required'          => 'Please provide an event date',
            'start_time.required'          => 'Please provide an event starting time',
            'description.required'         => 'Please provide a description',
            'venue.required'               => 'Please provide a venue name (Pizza Cafe, Bob\'s Bar, etc.)',
            'street.required'              => 'Please provide the venue\'s street address',
            'city.required'                => 'Please provide the venue\'s city',
            'state_id.required'            => 'Please provide the venue\'s state (Ohio, etc)',
            'zip.required'                 => 'Please provide the venue\'s zip code'
        ];

    }

}
