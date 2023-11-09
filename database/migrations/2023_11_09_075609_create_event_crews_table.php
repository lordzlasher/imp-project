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
        Schema::create('event_crews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_event')->constrained('events');
            $table->foreignId('id_karyawan')->constrained('karyawans');
            $table->string('status_crew');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_crews');
    }
};
