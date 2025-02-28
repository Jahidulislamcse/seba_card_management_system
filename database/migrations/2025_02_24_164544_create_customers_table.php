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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('avatar')->nullable();
            $table->string('card_no');
            $table->string('duration_year');
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->json('date_of_birth')->nullable();
            $table->string('nid_number')->nullable()->unique();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('upozila_id')->nullable()->constrained('upazilas')->onDelete('cascade');
            $table->foreignId('union_id')->nullable()->constrained('unions')->onDelete('cascade');
            $table->string('ward')->nullable();
            $table->string('post_code')->nullable();
            $table->string('phone')->unique();
            $table->string('status')->nullable()->default(STATUS_ACTIVE);
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
