<?php

use App\Enums\InvoiceFreghtStatusEnum;
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
        Schema::create('invoice_freghts', function (Blueprint $table) { //hóa đơn hàng hóa
            $table->id();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_address')->nullable();
            $table->string('weight')->nullable();
            $table->integer('recipient_phone_number')->unsigned();
            $table->integer('price')->unsigned()->nullable(); //giá
            $table->string('payer')->nullable();; // người trả tiền
            $table->string('current_position')->nullable();
            $table->enum('status', InvoiceFreghtStatusEnum::getValues())->default(InvoiceFreghtStatusEnum::notconfirm);
            $table->string('sender_name');
            $table->integer('sender_phone_number');
            $table->string('sender_address');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_freghts');
    }
};
