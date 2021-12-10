<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToSpatiePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spatie_permissions', function (Blueprint $table) {
            $table->text('slug')->after('name')->nullable();
            $table->text('description')->after('slug')->nullable();
            $table->string('module')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spatie_permissions', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'description',
                'module'
            ]);
        });
    }
}
