<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCycleCodeToCycleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cycle', function (Blueprint $table) {
            $table->string('cycle_code')->after('name')->nullable();
            $table->year('year')->after('cycle_code')->nullable();
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
        Schema::table('cycle', function (Blueprint $table) {
            $table->dropColumn(['cycle_code','year']);
            $table->dropSoftDeletesTz();
        });
    }
}
