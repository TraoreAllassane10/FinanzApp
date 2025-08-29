<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(private ?User $user)
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return view("pages.user.index", [
            "totalBalance" => $this->user->totalBalance(),
            "currentMonthExpenses" => $this->user->currentMonthExpenses(),
            "currentMonthIncome" => $this->user->currentMonthIncome(),
            "monthlyExpenses" => $this->user->monthlyExpense(),
            "monthlyIncome" => $this->user->monthlyIncome(),
            "lastTransactions" => $this->user->transactions()->latest()->take(3)->get(),
            "lastPockets" => $this->user->pockets()->latest()->take(3)->get(),
            "latestCard" => $this->user->cards()->latest()->first()
        ]);
    }
}
