<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ImportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'csv' => ['required', 'file', 'max:500000']
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->json($validator->errors()->first(), 422)));
    }
}
