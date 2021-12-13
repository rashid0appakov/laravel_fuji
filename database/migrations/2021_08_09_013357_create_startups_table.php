<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('preview')->nullable();
            $table->text('text')->nullable();
            $table->string('user')->nullable();
            $table->string('price_real')->nullalbe();
            $table->string('price_of')->nullalbe();
            $table->text('city')->nullalbe();
            $table->string('image')->nullable();
            $table->date('finish')->nullalbe();
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
        Schema::dropIfExists('startups');
    }
}
