<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashslugTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hashslug', function (Blueprint $table) {
            $table->hashslug();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('hashslug');
    }
}
