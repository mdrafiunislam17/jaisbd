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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('location')->nullable();
            $table->enum('job_type', ['Full Time', 'Part Time', 'Remote', 'Contractual'])
                ->default('Full Time');
           $table->unsignedInteger('vacancies')->default(1);
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->date('deadline')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
