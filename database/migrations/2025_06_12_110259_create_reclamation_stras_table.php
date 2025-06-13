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
        Schema::create('reclamation_stras', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('service');
            $table->integer('nb_recu');
            $table->integer('nb_traite');
            $table->text('motif_reclamation');
            $table->text('procedure_traitement');

            // Totaux globaux (mêmes valeurs pour chaque ligne d’une période)
            $table->integer('total_recu')->nullable();
            $table->integer('total_traite')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamation_stras');
    }
};
