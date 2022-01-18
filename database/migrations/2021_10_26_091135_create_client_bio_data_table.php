<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientBioDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_bio_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name');
            $table->string('nick_name')->nullable();
            $table->string('nationality')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->foreignId('education_level_id');
            $table->foreignId('marital_status_id');
            $table->foreignId('phone_ownership_id');
            $table->foreignId('district_id')->nullable();
            $table->foreignId('province_id')->nullable(); //municipality
            $table->foreignId('parish_ward_id')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->foreignId('sub_county_id')->nullable();
            $table->boolean('is_disabled')->default(false);
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_bio_data');
    }
}
