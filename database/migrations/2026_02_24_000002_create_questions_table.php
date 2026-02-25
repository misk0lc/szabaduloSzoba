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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('QuestionID');
            $table->unsignedBigInteger('LevelID');
            $table->text('QuestionText');
            $table->string('CorrectAnswer', 255);
            $table->integer('RewardDigit');
            $table->integer('MoneyReward')->default(0);
            $table->integer('PositionX');
            $table->integer('PositionY');

            $table->foreign('LevelID')
                  ->references('LevelID')
                  ->on('levels')
                  ->onDelete('cascade');

            $table->check('RewardDigit >= 0 AND RewardDigit <= 9');
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
