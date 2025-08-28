<?php

namespace App\Http\Requests\Pocket;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePocketRequest extends FormRequest
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
            "name" => ["required", "string","max:255"],
            "balance_gaol" => ["nullable", "numeric", "min:0"],
            "due_date" => ["nullable", "date", "after:today"],
            "is_blocked" => ["nullable", "boolean"]
        ];
    }
}
