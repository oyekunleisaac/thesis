<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifies', function (Blueprint $table) {
            $table->id();
            $table->string('sub');
            $table->string('dur');
            $table->string('free');
            $table->string('copy');
            $table->string('share');           
            $table->string('user_id');           
            $table->string('user_role');           
            $table->string('role');           
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
        Schema::dropIfExists('verifies');
    }
}
