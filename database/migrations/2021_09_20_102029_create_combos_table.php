<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('user_name');
            $table->string('fighter');
            $table->integer('damage')->nullable();
            $table->string('version');
            $table->integer('favorite_count')->default(0);
            $table->integer('adoption_count')->default(0);
            $table->string('starting');
            $table->string('counter_hit');
            $table->string('place')->default('どこでも');
            $table->integer('magic_circuit')->default(0);
            $table->integer('moon')->default(0);
            $table->string('recipe');
            $table->string('explain')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();

            $table->unique(['fighter','recipe']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dropForeign('combos_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos');
    }
}
