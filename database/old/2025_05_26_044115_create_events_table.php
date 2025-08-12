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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_name");
            $table->string("location");
            $table->date("event_date");
            $table->time("start_time");
            $table->time("end_time");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->text("location_map")->nullable();
            $table->text("short_description");
            $table->longText("description");
            $table->string("image");
            $table->json("gallery")
                ->nullable()
                ->comment("JSON Data");
            $table->boolean("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
