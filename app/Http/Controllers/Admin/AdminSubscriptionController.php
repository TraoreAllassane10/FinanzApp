<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        return view("pages.admin.subscription.index");
    }

    public function show() {
        return view("pages.admin.subscription.show");
    }
}
