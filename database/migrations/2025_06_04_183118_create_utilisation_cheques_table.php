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
        Schema::create('utilisation_cheques', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('code');
            $table->string('description');
            $table->integer('nbcheque');
            $table->bigInteger('valeurcfa');
            $table->integer('totalnbcheque');
            $table->bigInteger('totalvaleurcfa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisation_cheques');
    }
};
