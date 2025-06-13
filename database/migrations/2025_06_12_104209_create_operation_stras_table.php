<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operationstras', function (Blueprint $table) {
            $table->id();

            // Période commune
            $table->date('debut_periode');
            $table->date('fin_periode');

            // Détails
            $table->string('service');
            $table->string('pays');
            $table->string('motif');
            $table->integer('nb_transaction_emission');
            $table->bigInteger('valeur_transaction_emission');
            $table->integer('nb_transaction_reception');
            $table->bigInteger('valeur_transaction_reception');

            // Totaux pour toute la période (même dans chaque ligne)
            $table->integer('total_nb_emission');
            $table->bigInteger('total_valeur_emission');
            $table->integer('total_nb_reception');
            $table->bigInteger('total_valeur_reception');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_stras');
    }
};
