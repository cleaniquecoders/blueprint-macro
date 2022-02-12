<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bigs', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bigs');
    }
}
