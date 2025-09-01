<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ai_settings', function (Blueprint $table) {
            $table->id();
            $table->text('openai_api_key')->nullable();
            $table->string('default_language')->default('English');
            $table->text('free_analysis_prompt')->nullable();
            $table->text('premium_analysis_prompt')->nullable();
            $table->timestamps();
        });

        // Insert default record
        DB::table('ai_settings')->insert([
            'free_analysis_prompt' => "You are an AI assistant helping users understand their quiz results. Based on their answers: (quiz_answers), provide a brief analysis of their personality type and general recommendations...",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('ai_settings');
    }
};
