<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spatie_roles', function (Blueprint $table) {
            $table->string('role_code')->nullable()->unique()->after('name');
            $table->text('description')->nullable()->after('role_code');
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
            $table->dropColumn([
                'role_code',
                'description'
            ]);
        });
    }
}
