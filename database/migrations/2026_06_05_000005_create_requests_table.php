<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_phone')->nullable();
            $table->string('request_type')->nullable();
            $table->string('status')->nullable();
            $table->decimal('budget_min', 16, 2)->nullable();
            $table->decimal('budget_max', 16, 2)->nullable();
            $table->string('city')->nullable();
            $table->string('property_type')->nullable();
            $table->text('criteria')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
