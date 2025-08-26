<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        return view("pages.admin.subscription.index", [
            "subscriptions" => Subscription::orderByDesc("created_at")->get()
        ]);
    }

    public function show(Subscription $subscription) {
        return view("pages.admin.subscription.show", [
            "subscription" => $subscription
        ]);
    }

    public function disable(Subscription $subscription) {
        $subscription->status = Subscription::STATUS_DISABLED;
        $subscription->save();

        return redirect()->back()->with("success", "Abonnement desactivé avec succes");
    }

    public function enable(Subscription $subscription) 
    {
        $subscription->status = Subscription::STATUS_ACTIF;
        $subscription->save();

        return redirect()->back()->with("success", "Abonnement desactivé avec succes");
    }
}
