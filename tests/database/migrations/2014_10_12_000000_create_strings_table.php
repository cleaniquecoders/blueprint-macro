<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStringsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('strings', function(Blueprint $table) {
            $table->label();
            $table->name();
            $table->code();
            $table->reference();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('strings');
    }
}
