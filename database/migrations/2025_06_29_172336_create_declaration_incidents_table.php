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
    Schema::create('declaration_incidents', function (Blueprint $table) {
        $table->id();

        // Période
        $table->date('debut_periode');
        $table->date('fin_periode');

        // Eléments constitutifs (consolidés)
        $table->json('elements_constitutifs')->nullable();

        // Fiche descriptive incidents
        $table->json('incidents')->nullable();

        // Fiche motifs capture
        $table->json('captures')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaration_incidents');
    }
};
