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
        Schema::create('reclamation_cheque_cartes', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('type'); // 'carte' ou 'cheque'
            $table->string('motif');
            $table->string('etattraitement');
            $table->text('mesurescorrectives')->nullable();
            $table->integer('nbre');
            $table->integer('totalcarte')->nullable();
            $table->integer('totalcheque')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamation_cheque_cartes');
    }
};
