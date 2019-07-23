<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('body');

            //adding foreign keys
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('user_id');

            /*
             * define the relationship with question table this will help to
             * delete all related replies when deleting the particular question
             */
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');

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
        Schema::dropIfExists('replies');
    }
}
