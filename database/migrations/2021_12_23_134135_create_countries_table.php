<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
	public function up()
	{
		Schema::create('countries', function (Blueprint $table) {
			$table->id();
			$table->string('code')->unique();
			$table->json('country');
			$table->integer('confirmed');
			$table->integer('recovered');
			$table->integer('critical');
			$table->integer('deaths');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('countries');
	}
}
