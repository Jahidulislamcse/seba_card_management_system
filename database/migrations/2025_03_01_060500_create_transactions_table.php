<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 10, 2); // Amount of money sent
            $table->decimal('remaining_due', 15, 2)->default(0); // remaining due
            $table->enum('type', [Transaction::TYPE_CASH, Transaction::TYPE_DUE]); // Type of transaction (cash or due)
            $table->enum('status', [Transaction::STATUS_PENDING, Transaction::STATUS_COMPLETED, Transaction::STATUS_PARTIAL])->default('pending'); // Status of the transaction
            $table->text('notes')->nullable(); // Additional notes (optional)
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
        Schema::dropIfExists('transactions');
    }
};
