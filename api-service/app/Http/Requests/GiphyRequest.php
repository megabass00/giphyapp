<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiphyRequest extends FormRequest
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
            'title'     => 'min:3|max:150|required',
            'description' => 'min:3|max:255|required',
            'url'       => 'min:5|max:255',
        ];
    }
}
