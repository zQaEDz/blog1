<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
			$table->increments('id');
            $table->string('name');
			$table->text('content');
			$table->integer('author_id')->unsigned();
			$table->foreign('author_id')->references('id')
			->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->enum('enable',[1,0])->default('1');
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
        Schema::dropIfExists('news');
    }
}
