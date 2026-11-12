<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('laboratory_id')->constrained('laboratories')->restrictOnDelete();

            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');

            $table->text('purpose');

            $table->string('status', 20)->default('pendiente');

            $table->text('rejection_reason')->nullable();

            $table->timestamps();

            $table->index(['laboratory_id', 'date', 'status']);
        });

        DB::statement(
            'ALTER TABLE reservations ADD CONSTRAINT valid_reservation_time CHECK (end_time > start_time)'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
