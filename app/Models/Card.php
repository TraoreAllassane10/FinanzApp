<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public const CARD_TYPE_VISA = "VISA";
    public const CARD_TYPE_MASTERCARD = "MASTERCARD";
    public const CARD_TYPE_AMEX = "American Express";
    public const CARD_TYPE_UP = "UnionPay";

    protected $fillable = [
        "name",
        "type",
        "card_number",
        "cvv",
        "expiry_date",
        "balance",
        "user_id"
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public static function getCardTypes() {
        return [self::CARD_TYPE_VISA, self::CARD_TYPE_MASTERCARD, self::CARD_TYPE_AMEX, self::CARD_TYPE_UP];
    }

    // Definir le solde de la carte lors sa creation
    public static function boot() {
        parent::boot();

        self::creating(function ($card) {
            $card->balance = rand(0, 1000);
        });
    }

}
