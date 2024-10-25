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
        Schema::create('beasiswa_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number'); 
            $table->unsignedTinyInteger('semester');
            $table->decimal('ipk', 3, 2)->default(3.4);
            $table->enum('jenis_pilihan_beasiswa', ['akademik', 'non-akademik']);
            $table->string('file_path')->nullable();
            $table->enum('status_ajuan', ['belum diverifikasi', 'diverifikasi'])->default('belum diverifikasi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa_registrations');
    }
};