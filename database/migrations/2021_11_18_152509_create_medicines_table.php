<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();

            $table->text('anam_description')->nullable();
            $table->string('ant_personal')->nullable();
            $table->string('ant_family')->nullable();
            $table->boolean('importance')->nullable();
            $table->boolean('asymptomatic')->nullable();
            $table->text('orofaringe')->nullable();
            $table->text('cardiovascular')->nullable();
            $table->text('torax')->nullable();
            $table->text('lab_result')->nullable();
            $table->text('printdx')->nullable();
            $table->text('observations')->nullable();
            $table->enum('result', ['SI', 'NO'])->default('SI');
            $table->string('temperature')->nullable();
            $table->string('fc')->nullable();
            $table->string('spo2')->nullable();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
