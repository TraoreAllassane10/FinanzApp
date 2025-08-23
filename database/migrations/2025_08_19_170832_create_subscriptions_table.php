<?php

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Plan::class)->constrained()->cascadeOnDelete();
            $table->string("period")->default(Plan::MONTHLY_DURATION);
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->decimal('amount', 12, 2);
            $table->string('payment_status')->default(Subscription::PAYEMENT_STATUS_NO_PAYEMENT_REQUIRED);
            $table->string("status")->default(Subscription::STATUS_ACTIF);
            $table->string("session_id")->nullable();
            $table->integer("card_count")->default(0);
            $table->integer("pocket_count")->default(0);
            $table->integer("transaction_count")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
