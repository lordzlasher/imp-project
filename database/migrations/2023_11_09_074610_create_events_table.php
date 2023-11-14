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
            $table->date('tanggal_loading');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->text('ukuran_led');
            $table->text('alat_tambahan')->nullable();
            $table->text('venue');
            $table->text('note')->nullable();;
            $table->text('status')->nullable();;
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
