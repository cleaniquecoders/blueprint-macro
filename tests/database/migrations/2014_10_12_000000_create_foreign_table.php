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
            $table->addForeign('users');
            $table->addForeign('users', ['fk' => 'customer_id']);
            $table->addForeign('bigs', ['bigInteger' => true]);
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
