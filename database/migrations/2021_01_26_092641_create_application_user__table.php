<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->integer('evaluation')->unsigned();
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
        Schema::dropIfExists('application_user');
    }
}
