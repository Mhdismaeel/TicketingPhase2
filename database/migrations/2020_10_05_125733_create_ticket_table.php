<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->bigInteger('reporter_id')->unsigned();
            $table->string('slug')->nullable();
            $table->bigInteger('assign_id')->unsigned();
            $table->bigInteger('board_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('priority_id')->unsigned();
            $table->bigInteger('column_id')->unsigned();
            $table->bigInteger('parent_id')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
