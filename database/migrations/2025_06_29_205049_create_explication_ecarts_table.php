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
        Schema::create('explication_ecarts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('controle_encours_id')->constrained()->onDelete('cascade');
            $table->string('type_ecart'); // ex : ecartcantonnementvaleurfinale ou ecartcomptabilitecantonnement
            $table->date('dateoperation');
            $table->string('reference');
            $table->string('natureoperation');
            $table->bigInteger('montant');
            $table->text('observations');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explication_ecarts');
    }
};
