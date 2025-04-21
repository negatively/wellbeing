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
        Schema::create('life_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->date('date');
            $table->integer('work');
            $table->integer('rest');
            $table->integer('relationship');
            $table->integer('career');
            $table->integer('family');
            $table->integer('fun');
            $table->integer('health');
            $table->integer('personal_dev');
            $table->integer('friends');
            $table->integer('finances');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_balances');
    }
};
