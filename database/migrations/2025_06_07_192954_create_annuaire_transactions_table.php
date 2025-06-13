<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('annuaire_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annuaire_service_id')->constrained('annuaire_services')->onDelete('cascade');
            $table->enum('type_transaction', ['emission', 'reception']);
            $table->string('mode_envoi')->nullable();
            $table->string('mode_reception')->nullable();
            $table->integer('nb_intra')->default(0);
            $table->bigInteger('valeur_intra')->default(0);
            $table->integer('nb_hors')->default(0);
            $table->bigInteger('valeur_hors')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaire_transactions');
    }
};
