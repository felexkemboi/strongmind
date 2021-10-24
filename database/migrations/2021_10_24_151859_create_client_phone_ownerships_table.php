<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPhoneOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_phone_ownerships', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('slug')->unique()->index();
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
        Schema::dropIfExists('client_phone_ownerships');
    }
}
