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
        Schema::create('annuaire_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annuaire_stra_id')->constrained('annuaires_stras')->onDelete('cascade');
            $table->string('operateur');
            $table->string('code_service');
            $table->text('description_service')->nullable();
            $table->date('date_lancement')->nullable();
            $table->string('perimetre')->nullable();
            $table->text('mecanisme_compensation_reglement')->nullable();
            $table->integer('nbsous_agents')->default(0);
            $table->integer('nbpoints_service')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaire_services');
    }
};
