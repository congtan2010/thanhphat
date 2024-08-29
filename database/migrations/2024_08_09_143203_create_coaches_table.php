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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate')->unique(); //biển số xe khách
            $table->date('coach_maintenance_date'); //ngày bảo dưỡng
            $table->string('service')->nullable(); //dịch vụ
            $table->string('vehicle_type'); // loai xe
            $table->integer('sum_ticket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
