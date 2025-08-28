<?php

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
        Schema::table('pockets', function (Blueprint $table) {
           $table->string('name');
           $table->decimal("balance_goal", 12, 2);
           $table->date("due_date");
           $table->decimal("balance", 12, 2)->default(0);
           $table->float("progression")->default(0);
           $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
           $table->boolean("is_blocked")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pockets', function (Blueprint $table) {
            //
        });
    }
};
