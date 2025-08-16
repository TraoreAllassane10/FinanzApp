<?php

namespace App\Http\Controllers\User;

use App\Models\Pocket;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pocket\StorePocketRequest;
use App\Http\Requests\Pocket\UpdatePocketRequest;

class PocketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.user.pocket.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.user.pocket.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePocketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pocket $pocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pocket $pocket)
    {
        return view("pages.user.pocket.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePocketRequest $request, Pocket $pocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pocket $pocket)
    {
        //
    }
}
