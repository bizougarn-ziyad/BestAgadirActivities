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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->integer('participants')->default(1);
            $table->date('booking_date')->nullable();
            $table->decimal('price_per_person', 6, 2)->nullable();
            
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['activity_id']);
            $table->dropColumn(['activity_id', 'participants', 'booking_date', 'price_per_person']);
        });
    }
};
