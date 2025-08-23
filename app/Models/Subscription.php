<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    const PAYEMENT_STATUS_NO_PAYEMENT_REQUIRED = "GRATUIT";
    const PAYEMENT_STATUS_PAID = "PAYE";
    const PAYEMENT_STATUS_UNPAID = "NON PAYE";

    const STATUS_ACTIF = "ACTIF";
    const STATUS_DISABLED = "INACTIF";
    const STATUS_PANDING = "EN ATTENTE";

    protected $fillable = [
        "user_id",
        "plan_id",
        "period",
        "start_date",
        "end_date",
        "amount",
        "payment_status",
        "status",
        "session_id",
        "card_count",
        "pocket_count",
        "transaction_count"
    ];

    public function subscriber()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }
}
