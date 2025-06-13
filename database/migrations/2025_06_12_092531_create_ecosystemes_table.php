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
    Schema::create('ecosystemes', function (Blueprint $table) {
        $table->id();

        // Données globales
        $table->date('debut_periode');
        $table->date('fin_periode');
        $table->integer('nbsous_agents');
        $table->integer('nbpoints_service');
        $table->text('modalite_controle_sousagents');

        // Détails
        $table->string('service_offert');
        $table->text('description_service');
        $table->string('operateur');
        $table->string('pays_operateur');
        $table->string('perimetre_partenariat');
        $table->date('debut_partenariat');
        $table->date('fin_partenariat')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecosystemes');
    }
};
