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
        Schema::create('geckos', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->enum('line_albino', ['bell', 'tremper', 'rainwater']);
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->date('kelahiran');
            $table->longText('deskripsi')->nullable();
            $table->string('perkawinan')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geckos');
    }
};
