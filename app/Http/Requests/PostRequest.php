<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=> 'required | min:3 | max:50',
            'content'=> 'required | min:50',
            'image'=> 'required | min:5 | max:255',
            'reading_time'=> 'required | min:1 | max:60 | numeric',
            'author'=> 'required | min:3 | max:50',
        ];
    }

    public function messages()
    {
        return [

            'required' => 'il campo :attribute è obbligatorio',

            'min' => [
                'string' => 'il campo :attribute deve essere di almeno :min caratteri',
                'numeric' => 'il valore di :attribute non può essere inferiore a :min'
            ],
            'max' => [
                'string' => 'il campo :attribute non può avere piu di :max caratteri',
                'numeric' => 'il valore di :attribute non può essere superiore a :max '
            ]

        ];
    }
}
