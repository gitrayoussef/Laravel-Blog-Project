<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'postCreator' => ['exists:users,id'],
            'image' => ['mimes:jpg,png'],
            'tags' => ['']
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'A title\'s length is three characters as minimum',
            'description.required' => 'A description is required',
            'description.min' => 'A description\'s length is five characters as minimum',
        ];
    }
}
