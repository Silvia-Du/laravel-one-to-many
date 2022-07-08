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
            'reading_time'=> 'required | min:1 | max:4',
            'author'=> 'required | min:3 | max:30',
            'category'=> 'required | min:3 | max:20',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'Questo campo è obbligatorio',
            'title.min'=> 'Devi iserire almeno :min caratteri',
            'title.max'=> 'Testo troppo lungo, non superare i :max caratteri',

            'content.required'=> 'Questo campo è obbligatorio',
            'content.min'=> 'Content deve contenere almeno :min caratteri',

            'image.required'=> 'Questo campo è obbligatorio',
            'image.min'=> 'Devi iserire almeno :min caratteri',
            'image.max'=> 'Testo troppo lungo, non superare i :max caratteri',

            'reading_time.required'=> 'Questo campo è obbligatorio',
            'reading_time.min'=> 'Devi iserire almeno :min caratteri',
            'reading_time.max'=> 'Non superare i :max caratteri',

            'author.required'=> 'Questo campo è obbligatorio',
            'author.min'=> 'Devi iserire almeno :min caratteri',
            'author.max'=> 'Non superare i :max caratteri',

            'category.required'=> 'Questo campo è obbligatorio',
            'category.min'=> 'Devi iserire almeno :min caratteri',
            'category.max'=> 'Non superare i :max caratteri',

        ];
    }
}
