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
        Schema::create('due_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->nullable()->constrained('transactions')->onDelete('cascade');
            $table->decimal('amount', 10, 2); // Partial payment amount
            $table->datetime('datetime')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users', 'id')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users', 'id')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('due_payments');
    }
};
