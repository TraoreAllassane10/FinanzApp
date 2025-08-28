<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pocket extends Model
{
    protected $fillable = [
        "name",
        "balance_goal",
        "due_date",
        "balance",
        "progression",
        "is_blocked",
        "user_id"
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function calculateProgression()
    {
        if ($this->balance_goal >= 0 || $this->balance >= 0)
        {
            // Limiter à 100 et arrondir
            $this->progression = round(min(($this->balance/ $this->balance_goal) * 100), 2);
        }
    }
}
