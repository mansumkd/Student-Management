<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->string('branch');
            $table->string('regno');
            $table->string('exam');
            $table->integer('mark1');
            $table->integer('mark2');
            $table->integer('mark3');
            $table->integer('mark4');
            $table->integer('mark5')->nullable();
            $table->integer('mark6')->nullable();
            $table->integer('mark7')->nullable();
            $table->integer('mark8')->nullable();
            $table->integer('mark9')->nullable();
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
        Schema::dropIfExists('marks');
    }
}
