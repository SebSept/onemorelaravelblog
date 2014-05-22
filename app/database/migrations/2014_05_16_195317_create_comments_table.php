<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 45);
            $table->string('author_name', 45);
            $table->string('author_site', 45);
            $table->text('content');
            $table->boolean('published')->default('0');
            $table->integer('post_id')->references('id')->on('post');
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
		Schema::dropIfExists('comments');
	}

}
