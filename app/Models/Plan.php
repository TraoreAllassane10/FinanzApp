<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public const MONTHLY_DURATION = "Monthly";
    public const YEARLY_DURATION = "Yearly";
    public const FREE_ACCESS = 'FREE';
    
    protected $fillable = [
        "name",
        "price",
        "duration",
        "max_cards",
        "max_pocket",
        "max_transaction"
    ];

    public static function getDurationValues() {
        return [
            self::YEARLY_DURATION => "ANNUEL",
            self::MONTHLY_DURATION => "MENSUEL",
            self::FREE_ACCESS => "GRATUIT"
        ];
    }
}
