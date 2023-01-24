<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'client_name' => 'required',
            'summary' => 'required|min:10',
            'cover_image' => 'nullable|image|max:32000',
        ];
    }

    // qui posso fare function messages con return di un array con per es 'name.required' => 'mio messaggio', 'name.min' => 'name should be longer than 3...'
}
