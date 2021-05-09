<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TruckFilterRequest extends FormRequest
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
            'brand' => ['integer', 'nullable'],
            'year_from' => ['integer', 'nullable', 'min:'.config('truck.min_year'), 'max:' . date('Y')],
            'year_to' => ['integer', 'nullable', 'min:'.config('truck.min_year'), 'max:' . date('Y'), 'gte:year_from'],
            'owner' => ['string', 'nullable', new AlphaSpaces],
            'owners_count_from' => ['integer', 'nullable', 'min:1'],
            'owners_count_to' => ['integer', 'nullable', 'min:1', 'gte:owners_count_from'],
        ];
    }

    protected function failedValidation(Validator $validator) { 
        return redirect()->back()->withErrors($validator->errors())->withInput();
    }
}
