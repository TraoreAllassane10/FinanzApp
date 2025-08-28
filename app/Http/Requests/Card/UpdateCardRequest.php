<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCardRequest extends FormRequest
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
        $card_id = $this->route('card');

        return [
            "name" => ["required", "string", "max:255"],
            "type" => ["required", "string"],
            "card_number" => ["required", "numeric", "digits_between:13,19", Rule::unique("cards", "card_number")->ignore($card_id)],
            "cvv" => ["required", "numeric", "digits:3"],
            "expiry_date" => ["required", "date_format:Y-m-d", "after_or_equal:today"],
        ];
    }
}
