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
        Schema::create('incident_paiement_cartes', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('code'); // code de typenomenclature
            $table->text('description');
            $table->integer('nbcarte');
            $table->bigInteger('valeurcfa')->nullable();
            $table->integer('totalnombre'); // commun à toutes les lignes
            $table->bigInteger('totalvaleurcfa')->nullable(); // commun aussi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_paiement_cartes');
    }
};
