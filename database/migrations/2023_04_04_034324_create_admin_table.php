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
        Schema::create('admin', function (Blueprint $table) {
            $table->id(); //id otomatis auto increment
            $table->string('username',50)->nullable(); //type data varchar
            $table->string('password',20)->nullable(); //type data varchar
            $table->timestamps(); //otomatis dibuatkan kolom create_time dan update_time
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table');
    }
};
