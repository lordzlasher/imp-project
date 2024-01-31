<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->string('ukuran_led');
            $table->string('venue');
            $table->string('client');
            $table->text('note')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('id_kategori_event')->constrained('kategori_events')->onDelete('cascade');
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
