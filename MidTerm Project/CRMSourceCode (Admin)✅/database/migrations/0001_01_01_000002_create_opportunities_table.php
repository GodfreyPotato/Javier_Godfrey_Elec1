<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('estimated_value', 12, 2);
            $table->enum('status', ['open', 'deal'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
