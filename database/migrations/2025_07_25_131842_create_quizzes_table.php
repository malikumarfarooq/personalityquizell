<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Then add columns with ->after() in separate statements
        Schema::table('quizzes', function (Blueprint $table) {
            $table->integer('duration')->default(30)->after('is_active');
            $table->integer('passing_score')->default(5)->after('duration');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
