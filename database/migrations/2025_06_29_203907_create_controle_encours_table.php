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
        Schema::create('controle_encours', function (Blueprint $table) {
            $table->id();

            // Période
            $table->date('debut_periode');
            $table->date('fin_periode');

            // Totaux principaux
            $table->bigInteger('valeurinitiale');
            $table->bigInteger('nouvelleemission');
            $table->bigInteger('destructionmonnaie');
            $table->bigInteger('valeurfinale');

            // Solde total des comptes (calculé automatiquement)
            $table->bigInteger('soldecomptecantonnement')->nullable();
            $table->bigInteger('soldecomptabilite');
            $table->bigInteger('ecartcantonnementvaleurfinale');
            $table->bigInteger('ecartcomptabilitevaleurfinale');
            $table->bigInteger('ecartcomptabilitecantonnement');
            $table->bigInteger('nbtransaction');
            $table->bigInteger('valeurtransaction');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controle_encours');
    }
};
