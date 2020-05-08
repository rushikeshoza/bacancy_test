<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jan')->default(0);
            $table->integer('feb')->default(0);
            $table->integer('mar')->default(0);
            $table->integer('apr')->default(0);
            $table->integer('may')->default(0);
            $table->integer('jun')->default(0);
            $table->integer('jul')->default(0);
            $table->integer('aug')->default(0);
            $table->integer('sep')->default(0);
            $table->integer('oct')->default(0);
            $table->integer('nov')->default(0);
            $table->integer('dec')->default(0);
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
        Schema::dropIfExists('month_calculators');
    }
}
