<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->json('answers')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('min_score');
            $table->integer('max_score');
            $table->json('traits')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('payment_id')->nullable();
            $table->decimal('payment_amount', 8, 2)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->json('premium_content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('results');
    }
};
