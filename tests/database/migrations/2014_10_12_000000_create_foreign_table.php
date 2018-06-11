<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('foreign', function (Blueprint $table) {
            $table->addForeign('user_id', 'users');
            $table->addNullableForeign('supervisor_id', 'users');
            $table->referenceOn('user_id', 'users');
            $table->referenceOn('supervisor_id', 'users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('foreign');
    }
}
