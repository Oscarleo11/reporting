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
    Schema::create('indicateur_financiers', function (Blueprint $table) {
        $table->id();
        $table->date('debut_periode');
        $table->date('fin_periode');
        $table->string('code'); // correspond à IFIN_*
        $table->string('intitule'); // rempli automatiquement depuis code
        $table->bigInteger('valeur');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicateur_financiers');
    }
};
