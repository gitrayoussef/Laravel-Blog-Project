<?php

namespace App\Http\Requests;

use App\Rules\onlyThreePostsPerUser;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StorePostRequest extends FormRequest
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
            'title' => ['required', 'min:3' , 'unique:posts'],
            'description' => ['required', 'min:5'],
            'postCreator' => ['exists:users,id' , new onlyThreePostsPerUser],
            'image' => ['required','mimes:jpg,png'],
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
