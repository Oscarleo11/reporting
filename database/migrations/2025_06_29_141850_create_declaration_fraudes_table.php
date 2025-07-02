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
    Schema::create('declaration_fraudes', function (Blueprint $table) {
        $table->id();
        $table->date('debut_periode');
        $table->date('fin_periode');
        $table->string('code');
        $table->text('description');
        $table->integer('nbtransaction');
        $table->bigInteger('valeurtransaction');
        $table->text('dispositifgestion')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaration_fraudes');
    }
};
