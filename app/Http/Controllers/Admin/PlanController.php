<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plan\StorePlanRequest;
use App\Http\Requests\Plan\UpdatePlanRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.plan.index', [
            "plans" => Plan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.plan.edit', [
            'durations' => Plan::getDurationValues()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        Plan::create($request->validated());

        return to_route('plan.index')->with('success', 'Plan enregistré avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
         return view('pages.admin.plan.edit', [
            'durations' => Plan::getDurationValues(),
            'plan' => $plan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $plan->update($request->validated());

        return to_route('plan.index')->with('success', 'Plan modifié avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return back()->with('success','Plan supprimé avec succes');
    }
}
