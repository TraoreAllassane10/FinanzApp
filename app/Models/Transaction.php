<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public const TYPE_TRANSACTION_INCOME = "Revenu";
    public const TYPE_TRANSACTION_EXPENSE = "Depense";
    public const TYPE_TRANSACTION_TRANSFERT = "Transfert";

    protected $fillable = [
        "type" ,
        "amount",
        "source_id",
        "destination_id",
        "description",
        "user_id"
    ];

    public static function getTypes()
    {
        return [
            self::TYPE_TRANSACTION_INCOME,
            self::TYPE_TRANSACTION_EXPENSE,
            self::TYPE_TRANSACTION_TRANSFERT
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function source() {
        return $this->morphTo();
    }

    public function destination() {
        return $this->morphTo();
    }
}
