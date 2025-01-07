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
        Schema::create('ballots', function (Blueprint $table) {
            $table->id();
            $table->string('president');
            $table->string('vice_president');
            $table->string('secretary');
            $table->string('treasurer');
            $table->string('pio');
            $table->string('peace_officer_1');
            $table->string('peace_officer_2');
            $table->string('auditor');
            $table->string('business_manager_1');
            $table->string('business_manager_2');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballots');
    }
};
