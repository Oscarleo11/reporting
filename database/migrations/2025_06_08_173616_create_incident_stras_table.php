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
        Schema::create('incident_stras', function (Blueprint $table) {
            $table->id();

            // Période (commune à tous les incidents d'un lot)
            $table->date('debut_periode');
            $table->date('fin_periode');

            // Champs du détail
            $table->string('plateformetechnique');
            $table->string('risque');
            $table->date('dateincident');
            $table->string('libelleincident');
            $table->integer('nboccurrence');
            $table->text('descriptiondetaillee');
            $table->text('mesurescorrectives');
            $table->bigInteger('impactfinancier')->nullable();
            $table->string('statutincident');
            $table->date('datecloture')->nullable();
            $table->string('naturedeclaration')->nullable();
            $table->string('reference')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_stras');
    }
};
