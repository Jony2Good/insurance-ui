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
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('vehicleType')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('vin')->nullable();
            $table->string('bodyNumber')->nullable();
            $table->string('power')->nullable();
            $table->string('color')->nullable();
            $table->string('ptsType')->nullable();
            $table->string('ptsSeries')->nullable();
            $table->string('ptsNumber')->nullable();
            $table->string('ptsIssueDate')->nullable();
            $table->string('vehicleYear')->nullable();
            $table->string('regSeries')->nullable();
            $table->string('regNumber')->nullable();
            $table->string('regIssueDate')->nullable();
            $table->string('regCountry')->nullable();
            $table->string('regPlate')->nullable();
            $table->string('usagePurpose')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vehicles');
    }
};
