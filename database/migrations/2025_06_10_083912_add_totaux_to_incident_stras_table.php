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
        Schema::table('incident_stras', function (Blueprint $table) {
            $table->integer('totalincidents')->nullable();
            $table->bigInteger('totalimpactfinancier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incident_stras', function (Blueprint $table) {
            //
        });
    }
};
