<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class AlterTableClientFormChangeStatusId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_form', function (Blueprint $table) {
            // $table->integer('status_id')->change();
            DB::statement('ALTER TABLE client_form ALTER COLUMN status_id TYPE integer USING (status_id)::integer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_form', function (Blueprint $table) {
            //
        });
    }
}
