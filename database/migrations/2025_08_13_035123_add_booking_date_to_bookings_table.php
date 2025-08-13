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
        Schema::table('bookings', function (Blueprint $table) {
            //
           $table->unsignedInteger('adult')->default(0)->after('status');
           $table->unsignedInteger('child')->default(0)->after('adult');
           $table->time('booking_time')->nullable()->after('child');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
              $table->dropColumn(['adult', 'child']);
        });
    }
};
