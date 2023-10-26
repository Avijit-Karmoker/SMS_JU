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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_name');
            $table->string('department_name');
            $table->string('subject_1')->nullable();
            $table->string('subject_2')->nullable();
            $table->string('subject_3')->nullable();
            $table->string('subject_4')->nullable();
            $table->string('subject_5')->nullable();
            $table->string('subject_6')->nullable();
            $table->string('subject_7')->nullable();
            $table->string('subject_8')->nullable();
            $table->string('subject_9')->nullable();
            $table->string('subject_10')->nullable();
            $table->string('subject_11')->nullable();
            $table->string('subject_12')->nullable();
            $table->string('subject_13')->nullable();
            $table->string('subject_14')->nullable();
            $table->string('subject_15')->nullable();
            $table->string('subject_16')->nullable();
            $table->string('subject_17')->nullable();
            $table->string('subject_18')->nullable();
            $table->string('subject_19')->nullable();
            $table->string('subject_20')->nullable();
            $table->string('subject_21')->nullable();
            $table->string('subject_22')->nullable();
            $table->string('subject_23')->nullable();
            $table->string('subject_24')->nullable();
            $table->string('subject_25')->nullable();
            $table->string('subject_26')->nullable();
            $table->string('subject_27')->nullable();
            $table->string('subject_28')->nullable();
            $table->string('subject_29')->nullable();
            $table->string('subject_30')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
