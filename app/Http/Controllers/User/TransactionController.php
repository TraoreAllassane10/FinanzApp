<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Models\Card;
use App\Models\Pocket;

class TransactionController extends Controller
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
        $activeSubscription = $this->user->activeSubscription();

        return view('pages.user.transaction.index', [
            "transactions" => $this->user->transactions()->orderByDesc("id")->get(),
            "remaining_transactions" => $activeSubscription->plan->max_transaction - $this->user->transactions()->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.transaction.edit', [
            "types" => Transaction::getTypes(),
            "cards" => $this->user->cards()->where("balance", ">", "0")->get(),
            "source_pockets" => $this->user->pockets()->where("is_blocked", "!=", 1)->where("balance", ">", "0")->get(),
            "dest_pockets" => $this->user->pockets()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        // Obtenir les entités sources et destinations 
        $source = $this->getEntity($request->source_type, $request->source_id);
        $destination = $this->getEntity($request->destination_type, $request->destination_id);

        //Creer le transaction
        $transaction = $this->user->transactions()->create([
            "type" => $request->type,
            "description" => $request->description,
            "amount" => $request->amount
        ]);

        if ($source) {
            $transaction->source()->associate($source);
        }

        if ($destination) {
            $transaction->destination()->associate($destination);
        }

        //Enregistrer la transaion
        $transaction->save();

        //Mettre à jour le solde
        if ($source) {
            $source->balance -= $request->amount;

            if ($request->source_type === 'pocket') {
                $source->calculateProgression();
            }

            $source->save();
        }

        //Mettre à jour le solde
        if ($destination) {
            $destination->balance += $request->amount;

            if ($request->destination_type === 'pocket') {
                $destination->calculateProgression();
            }

            $destination->save();
        }

        $this->user->activeSubscription()->increment("transaction_count");

        return to_route("transaction.index")->with("success", "Transaction ajoutée avec sucess");
    }

    public function getEntity(?string $type, ?int $id)
    {
        if (!$type || !$id) {
            return null;
        }

        return match ($type) {
            "card" => Card::firstOrFail($id),
            "pocket" => Pocket::firstOrFail($id),
            default => throw new \InvalidArgumentException("Type d'entité non valide : ", $type)
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.user.transaction.edit', [
            "transaction" => $transaction,
            "type" => Transaction::getTypes(),
            "cards" => $this->user->cards()->where("balance", ">", "0")->get(),
            "source_pockets" => $this->user->pockets()->where("is_blocked", "!=", 1)->where("balance", ">", "0")->get(),
            "dest_pockets" => $this->user->pockets()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
         // Obtenir les entités sources et destinations 
        $source = $this->getEntity($request->source_type, $request->source_id);
        $destination = $this->getEntity($request->destination_type, $request->destination_id);

        //Creer le transaction
        $transaction->fill([
            "type" => $request->type,
            "description" => $request->description,
            "amount" => $request->amount
        ]);

        if ($source) {
            $transaction->source()->associate($source);
        }

        if ($destination) {
            $transaction->source()->associate($destination);
        }

        //Modifier la transaion
        $transaction->update();

        //Mettre à jour le solde
        if ($source) {
            $source->balance -= $request->amount;

            if ($request->source_type === 'pocket') {
                $source->calculateProgression();
            }

            $source->save();
        }

        //Mettre à jour le solde
        if ($destination) {
            $destination->balance += $request->amount;

            if ($request->destination_type === 'pocket') {
                $destination->calculateProgression();
            }

            $destination->save();
        }


        return to_route("transaction.index")->with("success", "Transaction modifiée avec sucess");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //Mettre à jour le solde
        if ($transaction->source) {
            $transaction->source->balance += $transaction->amount;

            if ($transaction->source_type === 'pocket') {
               $transaction->source->calculateProgression();
            }

            $transaction->source->save();
        }

        //Mettre à jour le solde
        if ($transaction->destination) {
            $transaction->destination->balance += $transaction->amount;

            if ($transaction->destination_type === 'pocket') {
                $transaction->destination->calculateProgression();
            }

            $transaction->destination->save();
        }

        $transaction->delete();

        $this->user->activeSubscription()->decrement("transaction_count");

        return redirect()->back()->with("success","Transaction supprimée avec sucess");
    }
}
