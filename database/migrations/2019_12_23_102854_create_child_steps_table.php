<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('child_title');
            $table->unsignedBigInteger('time_id');
            $table->foreign('time_id')->references('id')->on('times');
            $table->text('child_content');
            $table->unsignedBigInteger('parent_step_id');
            $table->foreign('parent_step_id')->references('id')->on('parent_steps');
            $table->unsignedBigInteger('num');
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
        Schema::dropIfExists('child_steps');
    }
}
