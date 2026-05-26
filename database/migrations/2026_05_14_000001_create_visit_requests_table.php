<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('visitor_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('prisoner_name');
            $table->date('request_date')->default(now());
            $table->string('status')->default('pending');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visit_requests');
    }
};