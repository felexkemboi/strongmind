<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingClientBiodataToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('first_name')->after('name');
            $table->string('last_name');
            $table->string('other_name');
            $table->string('nick_name')->nullable();
            $table->date('date_of_birth')->after('age');
            $table->string('nationality')->after('country_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->foreignId('education_level_id');
            $table->foreignId('marital_status_id');
            $table->foreignId('phone_ownership_id');
            $table->boolean('is_disabled')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
             $table->dropColumn([
                 'first_name',
                 'last_name',
                 'other_name',
                 'nick_name',
                 'date_of_birth',
                 'nationality',
                 'is_disabled',
             ]);

             $table->dropForeign(['project_id']);
             $table->dropForeign(['education_level_id']);
             $table->dropForeign(['marital_status_id']);
             $table->dropForeign(['phone_ownership_id']);
        });
    }
}
