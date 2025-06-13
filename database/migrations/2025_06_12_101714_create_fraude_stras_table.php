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
    Schema::create('fraudestras', function (Blueprint $table) {
        $table->id();

        // Période commune
        $table->date('debut_periode');
        $table->date('fin_periode');

        // Détail
        $table->string('fraude');
        $table->string('service');
        $table->integer('nb_fraude');
        $table->bigInteger('valeur_fraude');
        $table->text('mesures_correctives');
        $table->text('mode_operatoire');
        $table->date('debut_fraude');
        $table->date('fin_fraude');

        // Totaux
        $table->integer('total_fraude');
        $table->bigInteger('total_valeur_fraude');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraude_stras');
    }
};
