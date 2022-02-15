<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientsMakeNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_bio_data', function (Blueprint $table) {
            $table->foreignId('education_level_id')->nullable()->change();
            $table->foreignId('marital_status_id')->nullable()->change();
            $table->foreignId('phone_ownership_id')->nullable()->change();
            $table->foreignId('client_id')->nullable()->change();
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->string('other_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_bio_data', function (Blueprint $table) {
            //
        });
    }
}
