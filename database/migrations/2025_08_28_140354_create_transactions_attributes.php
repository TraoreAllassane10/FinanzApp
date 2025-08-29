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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('type');
            $table->string("description")->nullable();
            $table->decimal("amount", 12, 2);
            $table->foreignIdFor(User::class)->constrained()->onDelete("cascade");

            $table->nullableMorphs("source");
            $table->nullableMorphs("destination");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
