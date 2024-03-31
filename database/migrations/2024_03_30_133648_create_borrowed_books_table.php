<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedInteger('member_id');
            $table->unsignedInteger('author_id');
            $table->integer('date_count');
            $table->decimal('total_price');
            $table->string('borrowed_code');
            $table->string('status');
            $table->date('due_date');
            $table->timestamps();
            //note => created_at is borrowed_date
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_books');
    }
};
