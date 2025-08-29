<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const USER_ROLE = "user";
    public const ADMIN_ROLE = "admin";
    
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getImageUrl() {
        return Storage::url($this->image);
    }

    public function cards() {
        return $this->hasMany(Card::class, "user_id", "id");
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, "user_id", "id");
    }

    public function activeSubscription()
    {
        return $this->subscriptions()->where("status", Subscription::STATUS_ACTIF)->first();
    }

    public function pockets() {
        return $this->hasMany(Pocket::class,"user_id", "id");
    }

    public function transactions() {
        return $this->hasMany(Transaction::class,"user_id", "id");
    }


    // Calculer le solde total
    public function totalBalance()
    {
        return $this->pockets()->sum("balance") + $this->cards()->sum("balance");
    }

    //Les depenses du mois courant
    public function currentMonthExpenses() {
        return $this->transactions()->where("type", Transaction::TYPE_TRANSACTION_EXPENSE)
            ->whereYear("created_at", now()->year)
            ->whereMonth("created_at", now()->month)
            ->sum("amount");
    }

    //Les Revenus du mois courant
    public function currentMonthIncome() {
        return $this->transactions()->where("type", Transaction::TYPE_TRANSACTION_INCOME)
            ->whereYear("created_at", now()->year)
            ->whereMonth("created_at", now()->month)
            ->sum("amount");
    }

    //Calculer le montant des depenses mensuelles de l'année courante
    public function monthlyExpense() {
        $monthlyExpenses = [];

        foreach ($this->transactions() as $transaction) {
            if ($transaction->type == Transaction::TYPE_TRANSACTION_EXPENSE && $transaction->created_at->format("Y") == now()->format("Y")) {
                $month = $transaction->created_at->format("Y-m");

                if (!isset($monthlyExpenses[$month])) {
                    $monthlyExpenses[$month] = 0;
                }

                $monthlyExpenses[$month] += $transaction->amount;
            }

            return $monthlyExpenses;
        }
    }

    //Calculer le montant des revenus mensuelles de l'année courante
    public function monthlyIncome() {
        $monthlyIncome = [];

        foreach ($this->transactions() as $transaction) {
            if ($transaction->type == Transaction::TYPE_TRANSACTION_INCOME && $transaction->created_at->format("Y") == now()->format("Y")) {
                $month = $transaction->created_at->format("Y-m");

                if (!isset($monthlyIncome[$month])) {
                    $monthlyIncome[$month] = 0;
                }

                $monthlyIncome[$month] += $transaction->amount;
            }

            return $monthlyIncome;
        }
    }
}
