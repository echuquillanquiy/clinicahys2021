<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['ANTIGENO', 'MOLECULAR', 'RÁPIDA'])->default('ANTIGENO');
            $table->enum('result', ['POSITIVO', 'NEGATIVO', 'NO APLICA'])->default('NEGATIVO');
            $table->foreignId('patient_id')->constrained();
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
        Schema::dropIfExists('laboratories');
    }
}
