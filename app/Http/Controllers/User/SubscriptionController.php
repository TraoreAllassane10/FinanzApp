<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
     public function index()
    {
        return view('pages.user.subscription.index', [
            "subscriptions" => Auth::user()->subscriptions()->orderByDesc("id")->getResults()
        ]);
    }
}
