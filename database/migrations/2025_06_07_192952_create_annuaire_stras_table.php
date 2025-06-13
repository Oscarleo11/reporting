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
        Schema::create('annuaires_stras', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->integer('nbsous_agents');
            $table->integer('nbpoints_service');
            $table->integer('nb_emission_intra');
            $table->integer('valeur_emission_intra');
            $table->integer('nb_emission_hors');
            $table->integer('valeur_emission_hors');
            $table->integer('nb_reception_intra');
            $table->integer('valeur_reception_intra');
            $table->integer('nb_reception_hors');
            $table->integer('valeur_reception_hors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaire_stras');
    }
};
