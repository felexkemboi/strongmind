<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('patient_id')->unique()->index();
            $table->integer('phone_number')->unique();
            $table->foreignId('country_id');
            $table->string('gender')->nullable();
            $table->string('region');
            $table->string('city');
            $table->foreignId('timezone_id');
            $table->string('languages');
            $table->integer('age');
            $table->enum('client_type',['therapy','screening'])->default('screening');
            $table->boolean('therapy')->default(false);
            $table->foreignId('status_id');
            $table->foreignId('channel_id');
            $table->foreignId('staff_id')->index();
            $table->boolean('active')->default(true);
            $table->softDeletesTz();
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
        Schema::dropIfExists('clients');
    }
}
