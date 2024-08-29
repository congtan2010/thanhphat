<?php

use App\Enums\TicketStatusEnum;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('seat_position')->nullable(); //vị trí chố ngồi
            $table->string('userName');
            $table->integer('phoneNumber');
            $table->enum('status', TicketStatusEnum::getValues())->default(TicketStatusEnum::notpay);
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('coaches_id');
            $table->unsignedBigInteger('itinerary_management_id');
            $table->unsignedBigInteger('staff_id')->nullable();


            $table->foreign('coaches_id', 'tickets_coaches_id_foreign')->references('id')->on('coaches')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('itinerary_management_id', 'tickets_itinerary_management_id_foreign')->references('id')
                ->on('itinerary_management')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('staff_id', 'tickets_staff_id_foreign')->references('id')->on('staff')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id', 'tickets_user_id_foreign')->references('id')->on('users')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
