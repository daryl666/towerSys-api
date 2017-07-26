<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSiteCheck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_site_check', function($table)
        {
            $table->increments('id');
            $table->string('site_code', 20);
            $table->integer('region_id');
            $table->string('region_name', 10);
            $table->tinyinteger('site_check_type')->default('2');
            $table->tinyinteger('site_check_result');
            $table->datetime('site_check_req_time');
            $table->tinyinteger('site_check_req_check_status')->default('1');
            $table->tinyInteger('update_check_status')->default(null);
            $table->string('created_by', 255);
            $table->string('updated_by', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
