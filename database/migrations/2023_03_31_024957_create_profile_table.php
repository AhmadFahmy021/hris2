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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('hp',20);
            $table->text('alamat');
            $table->string('kota',100);
            $table->string('kec',100);
            $table->integer('pos');
            $table->foreignId('divisi_id')->nullable()->constrained('divisi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jabatan',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
