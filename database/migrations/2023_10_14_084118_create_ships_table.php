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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('fuel');
            $table->string('model');
            $table->enum('engine_status',['DOWN','READY', 'PENDING']);
            $table->integer('container_capacity');
            $table->integer('crew_capacity');
            $table->foreignIdFor(\App\Models\Journey::class)->nullable(); //journey_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
