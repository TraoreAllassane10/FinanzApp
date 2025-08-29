<?php

namespace App\Http\Requests\Transaction;

use App\Models\Card;
use App\Models\Pocket;
use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            "type" => [
                "required",
                "in:" . implode(",", [
                    Transaction::TYPE_TRANSACTION_INCOME,
                    Transaction::TYPE_TRANSACTION_EXPENSE,
                    Transaction::TYPE_TRANSACTION_TRANSFERT]),
                ],
            "source_id" => [
                "nullable",
                "required_if:type," . Transaction::TYPE_TRANSACTION_EXPENSE,
                "required_if:type," . Transaction::TYPE_TRANSACTION_TRANSFERT,
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $isCard = Card::find($value);
                        $isPocket = Pocket::find($value); 
                    }

                    if (!$isCard && !$isPocket) {
                        $fail("La source doit etre une carte ou une poche valide");
                    }
                }
            ],
            "destination_id" => [
                "nullable",
                "different:source_id",
                "required_if:type," . Transaction::TYPE_TRANSACTION_INCOME,
                "required_if:type," . Transaction::TYPE_TRANSACTION_TRANSFERT,
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $isCard = Card::find($value);
                        $isPocket = Pocket::find($value); 
                    }

                    if (!$isCard && !$isPocket) {
                        $fail("La source doit etre une carte ou une poche valide");
                    }
                }
            ],
            "description" => ["nullable", "string", "max:255"],
            "amount" => ["required", "numeric", "min:10.00"]
        ];
    }
}
