<?php

namespace App\Http\Requests;

use App\Rules\InArray;
use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
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
            'lang' => ['required', new InArray],
            'category' => 'nullable'
        ];
    }

    public function messages() 
    {
        return [
            'lang.required' => 'The lang field is required'
        ];
    }
}
