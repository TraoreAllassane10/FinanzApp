<?php

namespace App\Http\Controllers\User;

use App\Models\Pocket;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pocket\StorePocketRequest;
use App\Http\Requests\Pocket\UpdatePocketRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PocketController extends Controller
{
    public function __construct(private ?User $user){
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeSubscription = $this->user->activeSubscription();

        return view("pages.user.pocket.index",
            [
                "pockets" => $this->user->pockets()->orderByDesc("id")->get(),
                "remaining_pockets" => $activeSubscription->plan->max_pocket - $this->user->pockets()->count()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!$this->user->activeSubscription()?->canAddMorePocket())
        {
            return redirect()->back()->with("error","Impossible d'ajouter une poche");
        }

        return view("pages.user.pocket.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePocketRequest $request)
    {
        $this->user->pockets()->create($request->all());

        $this->user->activeSubscription()->increment("pocket_count");

        return to_route("pocket.index")->with("success","Poche ajoutée avec succes");
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
        return view("pages.user.pocket.edit", ["pocket" => $pocket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePocketRequest $request, Pocket $pocket)
    {
        $pocket->update($request->all());

        $pocket->calculateProgression();

        $pocket->save();

        return to_route("pocket.index")->with("success","Poche modifiée avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pocket $pocket)
    {
        $pocket->delete();

        return redirect()->back()->with("success","Poche supprimée avec succes");
    }
}
