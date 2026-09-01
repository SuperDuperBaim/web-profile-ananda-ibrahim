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
        Schema::table('visitors', function (Blueprint $table) {
            // Drop the old unique index on ip_address if it exists
            $table->dropUnique('visitors_ip_address_unique');

            // Add a composite unique index so the same IP can appear on different dates
            $table->unique(['ip_address', 'visited_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitors', function (Blueprint $table) {
            // Drop the composite unique index and restore the single-column unique
            $table->dropUnique('visitors_ip_address_visited_at_unique');
            $table->unique('ip_address');
        });
    }
};
