<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_managers', function (Blueprint $table) {
            $table->enum('type', ['internal', 'external'])->default('internal')->after('partylist_name');
        });
        Schema::table('peace_officers', function (Blueprint $table) {
            $table->enum('type', ['internal', 'external'])->default('internal')->after('partylist_name');
        });
        Schema::table('ballots', function (Blueprint $table) {
            $table->dropColumn(['business_manager_1', 'business_manager_2', 'peace_officer_1', 'peace_officer_2']);
            $table->string('business_manager_internal')->nullable();
            $table->string('business_manager_external')->nullable();
            $table->string('peace_officer_internal')->nullable();
            $table->string('peace_officer_external')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('business_managers', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('peace_officers', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('ballots', function (Blueprint $table) {
            $table->dropColumn(['business_manager_internal', 'business_manager_external', 'peace_officer_internal', 'peace_officer_external']);
            $table->string('business_manager_1')->nullable();
            $table->string('business_manager_2')->nullable();
            $table->string('peace_officer_1')->nullable();
            $table->string('peace_officer_2')->nullable();
        });
    }
};
