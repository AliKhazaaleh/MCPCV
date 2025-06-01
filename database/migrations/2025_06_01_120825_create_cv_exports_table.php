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
        Schema::create('cv_exports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id')->index();
            $table->timestamp('exported_at');
            $table->string('export_type');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_exports');
    }
};
