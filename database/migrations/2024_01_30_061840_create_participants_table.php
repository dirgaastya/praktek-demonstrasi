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
        Schema::create('participants', function (Blueprint $table) {
            $table->id('id_peserta');
            $table->string('kd_skema');
            $table->foreign('kd_skema', 'fk_kd_skema')->references('kd_skema')->on('schemes')->onDelete('CASCADE');
            $table->string('nm_peserta');
            $table->string('jekel');
            $table->string('alamat');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
