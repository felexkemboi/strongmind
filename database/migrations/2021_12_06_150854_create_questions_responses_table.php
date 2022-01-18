<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionresponses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('client_id');
            $table->foreignId('option_id');
            $table->text('value');
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
        Schema::table('questionresponses', function (Blueprint $table) {
            //
        });
    }
}
