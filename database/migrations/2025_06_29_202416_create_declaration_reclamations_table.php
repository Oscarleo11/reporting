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
    Schema::create('declaration_reclamations', function (Blueprint $table) {
        $table->id();

        $table->date('debut_periode');
        $table->date('fin_periode');

        $table->integer('nbenregistre');
        $table->integer('nbtraite');

        // Détail
        $table->integer('detail_nbenregistre');
        $table->integer('detail_nbtraite');
        $table->text('motif');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaration_reclamations');
    }
};
