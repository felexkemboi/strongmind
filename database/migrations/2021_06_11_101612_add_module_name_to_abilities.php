<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModuleNameToAbilities extends Migration
{
    public function up()
    {
        Schema::table('abilities', function (Blueprint $table) {
            $table->string('module_name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('abilities', function (Blueprint $table) {
            $table->dropColumn('module_name');
        });
    }
}
