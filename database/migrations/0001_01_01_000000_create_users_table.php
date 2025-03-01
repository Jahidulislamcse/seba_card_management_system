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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('pending');
            $table->string('role')->nullable();
            $table->string('father')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('nid')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->foreignId('division_id')->unsigned()->nullable();
            $table->foreignId('district_id')->unsigned()->nullable();
            $table->foreignId('upazila_id')->unsigned()->nullable();
            $table->foreignId('union_id')->unsigned()->nullable();
            $table->integer('ward')->nullable();
            $table->string('photo')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('cv')->nullable();
            $table->string('certificate')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('raw_password')->nullable();
            $table->decimal('total_balance', 10, 2)->default(0.00); // Partial payment amount
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
