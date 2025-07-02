<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solde_compte_cantonnements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('controle_encours_id')->constrained()->onDelete('cascade');
            $table->string('banque');
            $table->string('numerocompte');
            $table->string('intitulecompte');
            $table->bigInteger('solde');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solde_compte_cantonnements');
    }
};
