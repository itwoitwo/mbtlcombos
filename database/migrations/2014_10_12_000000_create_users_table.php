<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('mbtlc_id');
            $table->unsignedBigInteger('id')->unique()->index();
            $table->string('id_name');
            $table->string('name');
            $table->string('main_character')->default('Unknown');
            $table->string('platform')->default('--Unknown--');
            $table->string('network_color')->default('Unknown');
            $table->string('introduce')->default('Unknown');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
