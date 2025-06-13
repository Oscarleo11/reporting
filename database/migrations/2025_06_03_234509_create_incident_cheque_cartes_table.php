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
        Schema::create('incident_cheque_cartes', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('type');
            $table->date('dateincident');
            $table->string('libelleincident');
            $table->string('risque')->nullable();
            $table->integer('nboccurrence');
            $table->text('descriptiondetaillee')->nullable();
            $table->text('mesurescorrectives')->nullable();
            $table->bigInteger('impactfinancier');
            $table->string('statutincident');
            $table->date('datecloture')->nullable();
            $table->text('infoscomplementaires')->nullable();
            $table->integer('totalincidents');
            $table->bigInteger('totalimpactfinancier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_cheque_cartes');
    }
};
