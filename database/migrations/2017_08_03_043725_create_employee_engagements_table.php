<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeEngagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_engagements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender');
            $table->integer('years_of_service');
            $table->integer('age')->default(null);
            $table->integer('educational_level_id');
            $table->integer('token_id');
            $table->integer('work_area_id');
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
        Schema::drop('employee_engagements');
    }
}
