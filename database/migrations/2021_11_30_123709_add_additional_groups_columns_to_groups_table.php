<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalGroupsColumnsToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->string('group_id')->nullable();
            $table->foreignId('office_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->foreignId('cycle_id')->nullable();
            $table->foreignId('fascilitator_id')->nullable();
            $table->foreignId('supervisor_id')->nullable();
            $table->foreignId('therapy_mode_id')->nullable();
            $table->foreignId('mode_of_delivery_id')->nullable();
            $table->date('group_allocation_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign('office_id');
            $table->dropForeign('project_id');
            $table->dropForeign('cycle_id');
            $table->dropForeign('fascilitator_id');
            $table->dropForeign('supervisor_id');
            $table->dropForeign('therapy_mode_id');
            $table->dropForeign('mode_od_delivery_id');
            $table->dropColumn(['group_allocation_date','group_id']);
        });
    }
}
