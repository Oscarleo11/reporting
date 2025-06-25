<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('xml_exports', function ($table) {
            $table->id();
            $table->string('type');
            $table->date('debut_periode');
            $table->date('fin_periode');
            $table->string('filename');
            $table->string('status')->default('en_attente'); // en_attente, valide, non_valide
            $table->text('motif_refus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xml_exports');
    }
};
