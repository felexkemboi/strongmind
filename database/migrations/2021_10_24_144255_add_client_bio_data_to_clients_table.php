<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientBioDataToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->foreignId('project_id')->after('channel_id')->default(1);
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
            $table->string('other_name')->after('last_name');
            $table->string('nick_name')->after('other_name')->nullable();
            $table->date('date_of_birth')->after('age');
            $table->string('nationality')->after('country_id')->nullable();
            $table->foreignId('education_level_id')->after('nationality');
            $table->foreignId('marital_status_id')->after('education_level_id');
            $table->foreignId('phone_ownership_id')->after('marital_status_id');
            $table->boolean('is_disabled')->after('phone_ownership_id')->default(false);
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
                'first_name','last_name','other_name','nick_name',
                'date_of_birth',
                'nationality',
                'is_disabled'
            ]);
            $table->dropForeign(['project_id','education_level_id','marital_status_id','phone_ownership_id']);
        });
    }
}
