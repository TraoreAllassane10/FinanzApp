<?php

namespace App\Http\Controllers\User;

use App\Models\Card;
use App\Models\User;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Card\StoreCardRequest;
use App\Http\Requests\Card\UpdateCardRequest;

class CardController extends Controller
{
    public function __construct(private ?User $user)
    {
        $this->user = Auth::user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //L'abonnement actif de l'utilisateur
        $activeSubscription = Subscription::where("user_id", $this->user->id)->where("status", Subscription::STATUS_ACTIF)->first();

        if ($activeSubscription) {
            //Nombre de cas qu'il peut encore crée
            $remaningCards = $activeSubscription->plan->max_cards - $this->user->cards()->count();
        }
        else
        {
            $remaningCards = 0;
        }

        return view("pages.user.card.index", [
            "cards" => $this->user->cards()->orderByDesc("id")->get(),
            "remaningCards" => $remaningCards
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //L'abonnement actif de l'utilisateur
        $activeSubscription = Subscription::where("user_id", $this->user->id)->where("status", Subscription::STATUS_ACTIF)->first();

        if (!$activeSubscription->canAddMoreCards())
        {
            return redirect()->back()->with("error","Impossible d'ajouter plus de carte");
        }

        return view("pages.user.card.edit", [
            "card_types" => Card::getCardTypes()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $this->user->cards()->create($request->validated());

        Subscription::where("user_id", $this->user->id)->where("status", Subscription::STATUS_ACTIF)->increment("card_count");

        return to_route("card.index")->with("success", "Carte ajoutée avec succes");
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        return view("pages.user.card.edit", [
            "card" => $card,
            "card_types" => Card::getCardTypes()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $card->update($request->validated());

        return to_route("card.index")->with("success", "Carte modifiée avec succes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return back()->with("success", "Carte supprimée avec succes");
    }
}
