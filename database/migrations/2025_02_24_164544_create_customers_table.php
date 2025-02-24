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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->nullable();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->string('upazila')->nullable();
            $table->string('union')->nullable();
            $table->string('ward')->nullable();
            $table->string('avatar')->nullable();
            $table->string('status')->default(STATUS_PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
