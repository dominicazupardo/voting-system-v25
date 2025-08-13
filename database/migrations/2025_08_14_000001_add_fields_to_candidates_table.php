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
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('partylist_name')->nullable();
            $table->string('year')->nullable();
            $table->string('image')->nullable();
            $table->string('position')->nullable();
            $table->integer('votes')->default(0);
            $table->string('candidate_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn([
                'firstname', 'middlename', 'lastname', 'partylist_name', 'year', 'image', 'position', 'votes', 'candidate_no'
            ]);
        });
    }
};
