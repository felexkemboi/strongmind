<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUniqueContraintOnSpatieRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spatie_roles', function (Blueprint $table) {
            $table->dropUnique('spatie_roles_role_code_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spatie_roles', function (Blueprint $table) {
            $table->string('role_code')->nullable()->unique()->after('name');
        });
    }
}
