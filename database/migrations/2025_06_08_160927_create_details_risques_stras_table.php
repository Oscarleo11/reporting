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
        Schema::create('details_risques_stras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('risque_stra_id')->constrained('risques_stras')->onDelete('cascade');
            $table->string('code');
            $table->text('risque');
            $table->text('mecanisme_maitrise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_risques_stras');
    }
};
