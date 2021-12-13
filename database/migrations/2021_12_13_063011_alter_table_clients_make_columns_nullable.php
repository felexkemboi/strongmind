<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientsMakeColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('patient_id')->nullable()->change();
            $table->integer('phone_number')->nullable()->change();
            $table->foreignId('country_id')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('region')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->foreignId('timezone_id')->nullable()->change();
            $table->string('languages')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->string('client_type')->default('screening')->nullable()->change();
            $table->boolean('therapy')->default(false)->nullable()->change();
            $table->foreignId('status_id')->nullable()->change();
            $table->foreignId('channel_id')->nullable()->change();
            $table->foreignId('staff_id')->nullable()->change();
            $table->boolean('active')->default(true)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
