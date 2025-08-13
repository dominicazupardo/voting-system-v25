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
    // The 'votes' column already exists. This migration is now a no-op to avoid duplicate column error.
    // Schema::table('candidates', function (Blueprint $table) {
    //     $table->unsignedInteger('votes')->default(0);
    // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn('votes');
        });
    }
};
