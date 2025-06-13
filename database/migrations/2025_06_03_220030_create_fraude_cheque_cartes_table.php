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
        Schema::create('fraude_cheque_cartes', function (Blueprint $table) {
            $table->id();
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('type'); // CHEQUE ou CARTE
            $table->string('codecheque');
            $table->date('datefraude');
            $table->text('libellefraude')->nullable();
            $table->text('mesurescorrectives')->nullable();
            $table->text('modeoperatoire')->nullable();
            $table->integer('nbfraude');
            $table->bigInteger('valeurcfa');
            $table->integer('totalfraude');
            $table->bigInteger('totalvaleurcfa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraude_cheque_cartes');
    }
};
