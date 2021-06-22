<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('office_id')->constrained();
            $table->dateTime('last_login')->nullable();
            $table->unsignedTinyInteger('is_admin')->default(0);
            $table->unsignedTinyInteger('active')->default(0);
            $table->unsignedTinyInteger('approved')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
