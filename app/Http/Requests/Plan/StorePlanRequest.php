<?php

namespace App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', "string", "max:255", "unique:plans"],
            "price" => ['required', 'decimal:0,2'],
            "duration" => ['required', 'string'],
            "max_cards" => ["required", "numeric"],
            "max_pocket" => ["required", "numeric"],
            "max_transaction" => ["required", "numeric"],
        ];
    }
}
